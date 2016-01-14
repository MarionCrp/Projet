<?php include('controller/signin_controller.php') ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>World & I - Sign In </title>
</head>

<body>	

	<h1> Connexion </h1>
	<form action="" method="post">
		<p>
			Email : 
				<input type ="text" name="email" maxlength="50"/><br/>
			Mot de passe : 
				<input type="password" name="password" maxlength="50"/><br/>
			Connextion Automatique
				<input type="checkbox" name="auto_connect" />
			
			<input type="submit" value="Se Connecter" name="connexion"/>
		</p>
	</form>

	<form action="index.php" method="post"><input type="submit" value="Retour à l'accueil"></form>