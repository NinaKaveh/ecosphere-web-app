<?php

try {
    include("../Model/connect.php");         // waiting for database
} catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}

if (isset($_POST['registerForm'])) {

	$firstname = htmlspecialchars($_POST['name']);
	$email = htmlspecialchars(strtolower($_POST['email']));
	$pass = htmlspecialchars($_POST['psw']);
	$password = htmlspecialchars($_POST['psw2']);

	if (!empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['psw']) AND !empty($_POST['psw2'])) {

		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

			$reqmail = $bdd->prepare("SELECT * FROM users WHERE email = :mail");
			$reqmail->bindParam(":mail", $email);
			$reqmail->execute();
			$mailexist = $reqmail->rowCount();

			if ($mailexist == 0) {

				if ($pass == $password) {
					$pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);

					$insertmbr = $bdd->prepare("INSERT INTO user(name, email, password) VALUES(:name, :email, :pass)");
					$insertmbr->bindParam(":email", $email);
					$insertmbr->bindParam(":pass", $pass);
					$insertmbr->bindParam(":name", $lastname);
					$insertmbr->execute();

					$reqIdUser = $bdd->prepare("SELECT * FROM user WHERE email LIKE :mail");
					$reqIdUser->bindParam(":mail", $email);
					$userexist = $reqIdUser->execute();

					$userinfo = $reqIdUser->fetch();

					session_start();
					$_SESSION['id'] = $userinfo['id'];
					$_SESSION['email'] = $userinfo['email'];
					$_SESSION['lastname'] = $userinfo['lastname'];
					$_SESSION['firstname'] = $userinfo['firstname'];


					echo "Votre compte a bien été créé ! <a href=\"../index.php\">Me connecter</a>";


					$firstname = "";
					$lastname = "";
					$email = "";
					$pass = "";
					$password = "";

				} else {
					$erreur = "The passwords are not the same !";
					$erreurColor = "red";
				}
			} else {
				$erreur = "This email address is already taken !";
				$erreurColor = "red";
			}
		} else {
			$erreur = "Unvalid email format !";
			$erreurColor = "red";
		}
	} else {
		$erreur = "Must fill all the fields !";
		$erreurColor = "red";
	}
}

?>
