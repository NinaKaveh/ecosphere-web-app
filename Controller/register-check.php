<?php

try {
    include("Model/connect.php");
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


if (isset($_POST['registerForm'])) {

    $name = htmlspecialchars($_POST['name']);
    $mail = htmlspecialchars(strtolower($_POST['mail']));
    $email = htmlspecialchars(strtolower($_POST['email']));
    $pass = htmlspecialchars($_POST['pass']);
    $password = htmlspecialchars($_POST['password']);


    if (!empty($_POST['name']) AND !empty($_POST['mail']) AND !empty($_POST['email']) AND !empty($_POST['pass']) AND !empty($_POST['password'])) {


        if ($mail == $email) {

            if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {

                $reqmail = $bdd->prepare("SELECT * FROM user WHERE email = :mail");
                $reqmail->bindParam(":mail", $mail);
                $reqmail->execute();
                $mailexist = $reqmail->rowCount();

                if ($mailexist == 0) {

                    if ($pass == $password) {
                        $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
                        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

                        $insertmbr = $bdd->prepare("INSERT INTO user(name, email, password) VALUES(:name, :mail, :pass)");
                        $insertmbr->bindParam(":mail", $mail);
                        $insertmbr->bindParam(":pass", $pass);
                        $insertmbr->bindParam(":name", $name);
                        $insertmbr->execute();

                        $reqIdUser = $bdd->prepare("SELECT * FROM user WHERE email LIKE :mail");
                        $reqIdUser->bindParam(":mail", $mail);
                        $userexist = $reqIdUser->execute();

                        $errorColor = "green";

                        $userinfo = $reqIdUser->fetch();

                        session_start();
                        $_SESSION['id'] = $userinfo['id'];
                        $_SESSION['name'] = $userinfo['name'];
                        $_SESSION['email'] = $userinfo['email'];
                        $_SESSION['password'] = $userinfo['password'];
                        $_SESSION['bio'] = $userinfo['bio'];
                        $_SESSION['xp'] = $userinfo['xp'];
                        $errorColor = "blue";

                        $error = "Your account has been created !";

                        $name = "";
                        $mail = "";
                        $email = "";
                        $pass = "";
                        $password = "";

                    } else {
                        $error = "Passwords are not the same !";
                        $errorColor = "red";
                    }
                } else {
                    $error = "This e-mail address is already registered !";
                    $errorColor = "red";
                }

            } else {
                $error = "This e-mail isn't allowed on the website !";
                $errorColor = "red";
            }

        } else {
            $error = "E-mails are not the same !";
            $errorColor = "red";
        }


    } else {
        $error = "All the fields must be completed !";
        $errorColor = "red";
    }

}

?>
