<!-- AFFICHE DE LA LISTE D'UTILISATEURS INCRITS SUR LE SITE -->
<?php
	//include ('/controller/post_to_get.php');
	try {
		include('/controller/userlist_controller.php') ;

?>
<div id="userslist">
	<div class="users">
	<?php
		foreach ($users as $user) // On fait une boucle dans notre array, et on prend un par un chaque utilisateur
		{
			// Si l'utilisateur est l'utilisateur de la session, on passe au prochain utilisateur (on ne l'affiche pas)

			if ($user == $current_user) continue;
			$user_city_name = $city_manager->getCityName($user->cityId());
			$user_living_country_name = $city_manager->getCountry($user->cityId())->name();
			?>

			<!-- AFFICHAGE D'UN UTILISATEUR DE L'ARRAY EN BOUCLE -->
	 	<div class="col-lg-6 col-sm-6">
	      <div class="thumbnail userlist">
			<div class="panel panel-default">
			    <div class="panel-heading">
			    	<div class="panel-title"> 
			    		<h3><?= $user->name(); ?> <img src="<?= 'assets/images/'.Form::getGenderIcon($user).'.png'; ?>" alt="gender_male" width=30 class="text-right" /> </h3> 
			    		<b><?php echo $user_city_name. '</b> (' .$user_living_country_name.')'; ?>
			    	</div>
			    	<hr>
			    	<p> <?php echo _('Nationality');  ?> : <?= $country_manager->getCountryName($user->nationalityId()); ?> </p>
				</div>
			  	<div class="panel-body">
			  		<div class="desc">
				  		<p> <?php 
				  			$user_desc = $user->description();
				  			if (strlen($user_desc) > 150) {
				  			echo substr($user_desc, 0, 150).'... <a href="index.php?page=home&section=profile&id='.$user->id().'">'. _('read more'). '</a>';;
				  			} else if (ctype_space($user_desc) OR empty($user_desc)){
				  				echo _('No Description');
				  			} else {
				  				echo $user_desc;
				  			}  ?>
				  		</p>	
				  	</div>
						
						<a href="<?= 'index.php?page=home&section=profile&id='.$user->id(); ?>" class="btn btn-default navbar-btn"><?php echo _('Profile'); ?></a> <br>
						<a href="<?= 'index.php?page=home&section=messages&user_id='.$user->id(); ?>" class="btn btn-default"> <?php echo _('Send a message'); ?></a>  	
			  	</div>
			</div>
		  </div>
		</div>
			<!-- FIN affiche d'un utilisateur -->

		<?php
		}
		// Fin affichage de tous les utilisateurs

		?>
	</div>

	<div  class="bloc-page">
		<nav>
		  <ul class="pagination pagination-lg">
		  <?php
		    Form::getPagination($nb_users, $user_per_page, $url, $page); 
		   ?>
		  </ul>
		</nav>
	</div>
</div>


 <!-- FIN affichage de la liste des utilisateurs -->

<?php } catch (Exception $e) {
		echo '<div class="alert alert-danger" role="alert"> <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> '.$e->getMessage().'</div>';
	}