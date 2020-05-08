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

                        $error = "Votre compte a bien été créé !";

                        $name = "";
                        $mail = "";
                        $email = "";
                        $pass = "";
                        $password = "";

                    } else {
                        $error = "Vos mots de passes ne correspondent pas !";
                        $errorColor = "red";
                    }
                } else {
                    $error = "Cette adresse e-mail est déjà utilisée !";
                    $errorColor = "red";
                }

            } else {
                $error = "Votre adresse mail n'est pas valide !";
                $errorColor = "red";
            }

        } else {
            $error = "Vos adresses mail ne correspondent pas !";
            $errorColor = "red";
        }


    } else {
        $error = "Tous les champs doivent être complétés !";
        $errorColor = "red";
    }

}

?>
