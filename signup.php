<?php include('controller/signup_controller.php') ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>World & I - Sign Up </title>
</head>

<body>	

	<h1> Créer un compte utilisateur </h1>
	<form action="" method="post">
		<p>
			<p> * mention obligatoire </p>

			Nom * : 
				<input type ="text" name="name" maxlength="50"/><br/>
			Email * : 
				<input type="text" name="email" maxlength="50"/><br/>
			Mot de passe * : 
				<input type="password" name="password" maxlength="50"/><br/>
			Confirmer le mot de passe * : 
				<input type="password" name="confirmed_pw" maxlength="50"/><br/>
			Sexe * : 
				<select name="gender" id="gender">
					<option value="male"> Homme </option>
					<option value="female"> Femme </option>
				</select>

			Date de Naissance : 
				<select name="day" id="day">
				<?php $form->day() ?>
				</select>

				<select name="month" id="month">
					<option value="january"> Janvier </option>
					<option value="february"> Février </option>
					<option value="march"> Mars </option>
					<option value="april"> Avril </option>
					<option value="may"> Mai </option>
					<option value="june"> Juin </option>
					<option value="july"> Juillet </option>
					<option value="august"> Août </option>
					<option value="september"> Septembre </option>
					<option value="october"> Octobre </option>
					<option value="november"> Novembre </option>
					<option value="december"> Décembre </option>
				</select>

				<select name="year" id="year">
				<?php $form->year() ?>
				</select><br/>

			<p> Présentez-vous : <br/>
				<textarea name="description" id="description" rows="10" cols="60" /></textarea></p>

			<input type="submit" value="Créer un compte" name="create_account"/>
		</p>
	</form>

	<form action="index.php" method="post"><input type="submit" value="Retour à l'accueil"></form>