<!-- AFFICHE DE LA LISTE D'UTILISATEURS INCRITS SUR LE SITE -->

<?php
	
	include('/controller/userlist_controller.php') ; 

	foreach ($users as $user) // On fait une boucle dans notre array, et on prend un par un chaque utilisateur
	{
		// Si l'utilisateur est l'utilisateur de la session, on passe au prochain utilisateur (on ne l'affiche pas)

		if ($user == $current_user) continue;
		
		?>

		<!-- AFFICHAGE D'UN UTILISATEUR DE L'ARRAY EN BOUCLE -->
 	<div class="col-lg-4 col-sm-6">
      <div class="thumbnail">
		<div class="panel panel-default">
		    <div class="panel-heading">
		    	<div class="panel-title"> <h3><?= $user->name(); ?> <img src="<?= '../assets/images/'.getGenderIcon($user).'.png'; ?>" alt="gender_male" width=30 /> </h3> </div>
		    	<p> Nationality : <?= $country_manager->getCountryName($user->nationalityId()); ?> </p>
		    	<p> Living in <?= $city_manager->getCityName($user->cityId()); ?> 
			</div>
		  	<div class="panel-body">
		  		<p> <?= $user->description(); ?> </p>	
			  	<form method="get" action="">
			   		<input type="hidden" value="mymessages" name="section">
			  		<input type="hidden" value=<?= $user->id() ?> name="user_id">
					<input type="submit" class="btn btn-default navbar-btn" value="<?php echo _('Send a message'); ?>" /><br/>
					<a href="<?= 'index.php?page=home&section=profile&id='.$user->id(); ?>" class="btn btn-default navbar-btn"><?php echo _('Profile'); ?></a>
				</form>		   	
		  	</div>
		</div>
	  </div>
	</div>
		<!-- FIN affiche d'un utilisateur -->

		<?php
	}

 /* FIN affichage de la liste des utilisateurs*/