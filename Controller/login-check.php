<?php

try{
    include ("Model/connect.php");
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if(isset($_POST['login'])) {

    $email_login = htmlspecialchars(strtolower($_POST['email_login']));
    $password = htmlspecialchars($_POST['psw']);

    if(!empty($_POST['email_login']) AND !empty($_POST['psw'])) {

        if(filter_var($email_login, FILTER_VALIDATE_EMAIL)) {

            $reqIdUser = $bdd->prepare("SELECT * FROM user WHERE email LIKE :mail");
            $reqIdUser->bindParam(":mail",$email_login);
            $userexist = $reqIdUser->execute();
            $userexist = $reqIdUser->rowCount();

            if($userexist == 1) {

                $userinfo = $reqIdUser->fetch();
                if(password_verify($password,$userinfo['password'])) {

                    $errorColor = "green";
                    $error_login = "Connecting...";
                    session_start();
                    $_SESSION['id'] = $userinfo['id'];
                    $_SESSION['name'] = $userinfo['name'];
                    $_SESSION['email'] = $userinfo['email'];
                    $_SESSION['password'] = $userinfo['password'];
                    $_SESSION['bio'] = $userinfo['bio'];
                    $_SESSION['xp'] = $userinfo['xp'];
                    header('Location: View/user/user_homepage.php');      
                    exit();
                }
                else {
                    $errorColor = "red";
                    $error_login = "Incorrect password.";
                }
            }
            else {
                $errorColor = "red";
                $error_login = "Email not found.";
            }

            $password = "";

        }
        else {$email = "";$error_login = "Invalid Email address !";$errorColor = "red";}

    }
    else {$error_login = "All the fields must be completed !" ;$errorColor = "red";}

}

?>
