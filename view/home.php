<div class="row">
 	<div class="col-xs-6">
  		<?php
  		include('myprofile.php'); ?>
  	</div>
  

<!-- 	<div class="col-md-6 users_list"> -->
	
	<?php

		if (isset($_SESSION['user'])) 
		{
			$users = $user_manager->getList();
			foreach ($users as $user) 
			{
				if ($user == $current_user) continue;
				
				?>
<!-- 
				<form method="get" action="">
				<div class="user_profil_box">
					<input type="hidden" value="mymessages" name="page">
					<h2> <?= $user->name(); ?> </h2>
					<p> <?= $user->description(); ?> </p>
					<input type="hidden" value=<?= $user->id() ?> name="user_id">
					<input type="submit" class="btn btn-default navbar-btn" value="Envoyer un message" />
				</div>
				</form> -->
				

				<?php
			}
		} 

			else  {

				?>

				<div id ="apres">
						<p>
							<H2> Ce projet est un site de rencontres multiculturelles. Son objectif est de mettre en relation : </H2>
							<br/>
							<li>des personnes de nationalités différentes pour permettre des échanges culturels et linguistiques.</li>
							<li>des personnes de nationalité commune pour les expatriés ayant le mal du pays! </li>
							<br/>
							Nous sommes trois étudiants en DUT informartique en Année Spéciale, et nous débutons dans la programmation Web.
							<br/>
							Ce projet sera l'occasion pour nous d'apprendre et de mettre en pratique directement les langages appris. 
							<br/>
							<H2>Technologies utilisées jusque là :</H2>
							<br/>
							<li>HTML5/CSS3</li>
							<li>PHP (en programmation orienté objet)</li>
							<li>MySQL</li>
							Le but étant de faire évoluer le code en fonction des technologies apprises à l'IUT et en autoformation (modèle MVC, framework Symfony etc.)
							<br/>
							<br/>
							Marion, Kévin et Loïc<br/>
							
						</p>

					</div>

					<?php
	}

	?>
<!-- 	</div> -->
</div>




