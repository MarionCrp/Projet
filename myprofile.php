<?php 

if(isset($_SESSION['user']))
{

?>
	<h1 style="margin: 20px;">Bienvenue</h1>
		<div class="container user_profil_box" style="width: 300px;">
			<h2> Mon profil </h2>
			<p> Nom : <?= $current_user->name() ?> </p>
			<p> Email : <?= $current_user->email() ?> </p>
			<p> Sexe : <?= $current_user-> gender() ?></p>
			<p> Description : <?= $current_user-> description() ?></p>



		<form action="index.php?page=edit_profile" method="post"><input type="submit" value="Modifier mon profil"></form>
		<a href="index.php?page=mymessages"><button type="button" class="btn btn-default navbar-btn">Mes Messages</button></a>
		</div>


		<form action="controller/deconnexion.php" method="post">
			<input type="submit" value="Se déconnecter" name="deconnexion" style="margin: 20px;">
		</form>



		
	<?php
	}
	else  {
		echo '<form action="index.php?page=signin" method="post"><input type="submit" value="Se connecter"></form>';
		echo '<p><form action="index.php?page=signup" method="post"> Pas encore inscrit ? <input type="submit" value="Créer un compte"></form>';
	}

?>

