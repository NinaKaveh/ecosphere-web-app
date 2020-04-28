<?php

try {
    include ("Model/connect.php");
}
catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}

if(isset($_POST['login'])) {


    $email = htmlspecialchars(strtolower($_POST['email']));
    $password = htmlspecialchars($_POST['psw']);

    if(!empty($_POST['mail']) AND !empty($_POST['psw'])) {

        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $reqIdUser = $bdd->prepare("SELECT * FROM user WHERE email LIKE :mail");
            $reqIdUser->bindParam(":mail",$email);
            $userexist = $reqIdUser->execute();
            $userexist = $reqIdUser->rowCount();

            if($userexist == 1) {

                $userinfo = $reqIdUser->fetch();
                if(password_verify($password,$userinfo['password'])) {

                    $errorColor = "green";
                    $erreur = "Connecting...<a href='../index.php'>Me connecter</a>";
                    session_start();
                    $_SESSION['id'] = $userinfo['id'];
                    $_SESSION['name'] = $userinfo['name'];
                    $_SESSION['email'] = $userinfo['email'];
                    $_SESSION['password'] = $userinfo['password'];
                    $_SESSION['bio'] = $userinfo['bio'];
                    $_SESSION['xp'] = $userinfo['xp'];
                }
                else {
                    $errorColor = "red";
                    $erreur = "Mot passe incorrect.";
                }
            }
            else {
                $errorColor = "red";
                $erreur = "Email not found.";
            }

            $password = "";

        }
        else {$email = "";$erreur = "Invalid Email address !";$errorColor = "red";}

    }
    else {$erreur = "All the fields must be completed !" ;$errorColor = "red";}

}

?>
