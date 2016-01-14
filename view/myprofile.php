<?php 

if(isset($_SESSION['user']))
{

?>
		<div class="container user_profil_box">
			<h2> Mon profil </h2>
			<p> Nom : <?= $current_user->name() ?> </p>
			<p> Email : <?= $current_user->email() ?> </p>
			<p> Sexe : <?= $current_user-> gender() ?></p>
			<p> Description : <?= $current_user-> description() ?></p>

		<form action="index.php?page=home&section=edit_profile" method="post"><input type="submit" value="Modifier mon profil"></form>
	

		</div>


		
	<?php
	}
?>

