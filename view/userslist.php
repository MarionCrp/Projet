<!-- AFFICHE DE LA LISTE D'UTILISATEURS INCRITS SUR LE SITE -->

<?php

// On stoque dans l'array $users, la liste des utilisateurs isncrits

$users = $user_manager->getList();

	foreach ($users as $user) // On fait une boucle dans notre array, et on prend un par un chaque utilisateur
	{
		// Si l'utilisateur est l'utilisateur de la session, on passe au prochain utilisateur (on ne l'affiche pas)

		if ($user == $current_user) continue;
		
		?>

		<!-- AFFICHAGE D'UN UTILISATEUR DE L'ARRAY EN BOUCLE -->

		<div class="panel panel-default">
		    <div class="panel-heading">
		    	<h3 class="panel-title"> <h3><?= $user->name(); ?> ( <?= $user->gender(); ?> )</h3> </h3>
		    	<p> Nationality : <?= $country_manager->getCountryName($user->nationalityId()); ?> </p>
		    	<p> Living in <?= $city_manager->getCityName($user->cityId()); ?> 
			</div>
		  	<div class="panel-body">
		  		<p> <?= $user->description(); ?> </p>	
			  	<form method="get" action="">
			   		<input type="hidden" value="mymessages" name="page">
			  		<input type="hidden" value=<?= $user->id() ?> name="user_id">
					<input type="submit" class="btn btn-default navbar-btn" value="<?php echo _('Send a message'); ?>" />
				</form>		   	
		  	</div>
		</div>

		<!-- FIN affiche d'un utilisateur -->

		<?php
	}

 /* FIN affichage de la liste des utilisateurs*/