<?php

try{
	include ("Model/connect.php");
} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
	echo '<h1>CE QUI EST ECRIT AU DESSUS C EST PAS GRAVE C EST POUR LE REGISTER POPUP</h1>';

}



if(isset($_POST['registerForm'])) {

	$name = htmlspecialchars($_POST['name']);
	$mail = htmlspecialchars(strtolower($_POST['mail']));
	$email = htmlspecialchars(strtolower($_POST['email']));
	$pass = htmlspecialchars($_POST['pass']);
	$password = htmlspecialchars($_POST['password']);


	if(!empty($_POST['name']) AND !empty($_POST['mail']) AND !empty($_POST['email']) AND !empty($_POST['pass']) AND !empty($_POST['password'])) {


			if($mail == $email) {

				if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {

					$reqmail = $bdd->prepare("SELECT * FROM user WHERE email = :mail");
					$reqmail->bindParam(":mail",$mail);
					$reqmail->execute();
					$mailexist = $reqmail->rowCount();

					if($mailexist == 0) {

							if($pass == $password) {
								$pass = password_hash($_POST['pass'],PASSWORD_BCRYPT);
								$password = password_hash($_POST['password'],PASSWORD_BCRYPT );

								$insertmbr = $bdd->prepare("INSERT INTO user(name, email, password) VALUES(:name, :mail, :pass)");
								$insertmbr->bindParam(":mail",$mail);
								$insertmbr->bindParam(":pass",$pass);
								$insertmbr->bindParam(":name",$name);
								$insertmbr->execute();

								$reqIdUser = $bdd->prepare("SELECT * FROM user WHERE email LIKE :mail");
								$reqIdUser->bindParam(":mail",$mail);
								$userexist = $reqIdUser->execute();

								$erreurColor = "green";

								$userinfo = $reqIdUser->fetch();

								session_start();
								$_SESSION['id'] = $userinfo['id'];
								$_SESSION['email'] = $userinfo['email'];
								$_SESSION['name'] = $userinfo['name'];
								$erreurColor = "blue";

								$erreur = "Votre compte a bien été créé ! <a href=\"../index.php\">Me connecter</a>";

								$name = "";
								$mail = "";
								$email = "";
								$pass = "";
								$password = "";

							}
							else {$erreur = "Vos mots de passes ne correspondent pas !";$erreurColor = "red";}
					}
					else {$erreur = "Cette adresse e-mail est déjà utilisée !";$erreurColor = "red";}

				}
				else {$erreur = "Votre adresse mail n'est pas valide !";$erreurColor = "red";}

			}
			else {$erreur = "Vos adresses mail ne correspondent pas !";$erreurColor = "red";}


	}
	else {$erreur = "Tous les champs doivent être complétés !" ;$erreurColor = "red";}

}

?>