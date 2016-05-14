<!-- AFFICHE DE LA LISTE D'UTILISATEURS INCRITS SUR LE SITE -->
<?php
	
	include('/controller/userlist_controller.php') ;
?>
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
	      <div class="thumbnail">
			<div class="panel panel-default">
			    <div class="panel-heading">
			    	<div class="panel-title"> 
			    		<h3><?= $user->name(); ?> <img src="<?= '../assets/images/'.Form::getGenderIcon($user).'.png'; ?>" alt="gender_male" width=30 class="text-right" /> </h3> 
			    		<b><?php echo $user_city_name. '</b> (' .$user_living_country_name.')'; ?>
			    	</div>
			    	<hr>
			    	<p> Nationality : <?= $country_manager->getCountryName($user->nationalityId()); ?> </p>
				</div>
			  	<div class="panel-body">
			  		<div class="userlist_description">
				  		<p> <?php 
				  			if (strlen($user->description()) > 150) {
				  			echo substr($user->description(), 0, 150).'... <a href="index.php?page=home&section=profile&id='.$user->id().'">'. _('read more'). '</a>';;
				  			} else {
				  				echo $user->description();
				  			}  ?>
				  		</p>	
				  	</div>
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

		?>
	</div>

	<nav class="bloc-page">
	  <ul class="pagination pagination-lg">
	    <?php Form::getPagination($nb_users, 6, 'index.php?page=home&section=userslist&pagenb='); ?>
	    </li>
	  </ul>
	</nav>
	</div>


 <!-- FIN affichage de la liste des utilisateurs -->