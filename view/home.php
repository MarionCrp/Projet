	<?php

		if (isset($_SESSION['user'])) 
		{
			?>

			<div class="row">
				<div class="col-md-3"><!-- Large button group -->
					<div class="btn-group">
					  <button class="btn btn-default btn-lg dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-align-justify"></span>
					    Menu 
					  </button>
					  <ul class="dropdown-menu" role="menu">
					    <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?page=home&section=myprofile"><span class="glyphicon glyphicon-user"></span>Mon Profil</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?page=home&section=mymessages"><span class="glyphicon glyphicon-envelope"></span>Mes Messages</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?page=home&section=userslist"><span class="glyphicon glyphicon-search"></span></span>Mes amis</a></li>
					  </ul>
					</div>
				</div>





				  <div class="col-md-9">

				  <?php if(isset($_GET['section'])) 
						{
							$section = $_GET['section'];
						}

						else 
						{
							$section = 'userslist';
						}

						include ($section.'.php');

			       ?>
				  </div>
			</div>
			

			


			
		<?php
		} 

			else  {
				?>

				<!-- <div id ="apres"> -->
				<div class="jumbotron">
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






