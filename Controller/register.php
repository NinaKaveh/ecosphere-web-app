<!DOCTYPE html>

<html>

  <head>
    <meta charset="utf-8">
  </head>

  <header>
  </header>

	<section class="register">
		    
		<?php require("register-check.php"); ?>

		<h2>Inscription</h2>
		<?php
		if(isset($erreur) && isset($_SESSION['id'])) {
			header('Location: ../index.php');
		}
		else if (isset($erreur)) {
			echo '<font color='.$erreurColor.'>'.$erreur."</font>";
		}
		?>
		<form method="POST" action="">
		<table class="register" style="width:100%">
			<tr>
			    <th colspan="1">Inscrivez-vous !</th>
			</tr>

		   	<tr>

		      	<td class="registerColG">
		        	<label for="name">Name :</label>
		      	</td>
		      	<td class="registerColD">
		         	<input type="text" placeholder="Name" id="name" name="name" value="<?php if(isset($name)) { echo $name; } ?>" />
		      	</td>

		   	</tr>

		   	<tr>

		      	<td class="registerColG">
		        	<label for="mail">Mail :</label>
		      	</td>
		      	<td class="registerColD">
		        	<input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
		    	</td>

		   	</tr>

		   	<tr>

		      	<td class="registerColG">
		         	<label for="email">Confirmation du mail :</label>
		      	</td>
		      	<td class="registerColD">
		         	<input type="email" placeholder="Confirmez votre mail" id="email" name="email" value="<?php if(isset($email)) { echo $email; } ?>" />
		      	</td>

		   	</tr>

		   	<tr>

		      	<td class="registerColG">
		        	<label for="pass">Mot de passe :</label>
		    	</td>
		      	<td class="registerColD">
		        	<input type="password" placeholder="Votre mot de passe" id="pass" name="pass" value="<?php if(isset($pass)) { echo $pass; } ?>" />
		    	</td>

		   	</tr>

		   	<tr>
		      	<td class="registerColG">
		        	<label for="password">Confirmation du mot de passe :</label>
		      	</td>
		      	<td class="registerColD">
		        	<input type="password" placeholder="Confirmez votre mdp" id="password" name="password" value="<?php if(isset($password)) { echo $password; } ?>" />
		      	</td>
		   	</tr>





		</table>

		<div>
			<h3><a href="cgu.html">En vous inscrivant, vous acceptez les conditions d'utilisation</a></h3>
		</div>
	                 
	    <div class="vitrine_text1">
	    	<p id="texte_vitrine_text1"><a href="../index.php">Retour à la page d'accueil</a></p><br/>
	    </div>

		<input class="tested" type="submit" name="registerForm" value="S'inscrire" />
		</form>

	</section>

  </body>
</html>