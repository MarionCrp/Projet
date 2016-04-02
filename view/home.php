
	<style>
		#affichage_derniers_inscrits {
			border-style: solid;
			padding: 0.5em 0.5em 0.5em;
			border-color: grey;
			border-width: medium;
			background-color: #bbbbbb;
			width: 80%;
			margin: auto;
			opacity: 0.85;
			filter: alpha(opacity=10);
			margin-bottom: 2em;
			clear: both;
			overflow: hidden; /*pour les images*/
		}	
		
		#recherche_utilisateur, #affiche_recherche_utilisateur {
			border-style: solid;
			padding: 0.5em 0.5em 0.5em;
			border-color: grey;
			border-width: medium;
			background-color: #bbbbbb;
			width: 80%;
			margin: auto;
			opacity: 0.85;
			filter: alpha(opacity=10);
			margin-bottom: 2em;
			clear: both;
			overflow: hidden; /*pour les images*/
		}
	</style>
	
	
	<!------------- fin affichage des derniers inscrits (5)------->
	<div id="affichage_derniers_inscrits">	
		<?php
			try{
				$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				// INFORMATIONS DE CONNEXION
				$host = 	'localhost';
				$dbname = 	'projet';
				$user = 	'root';
				$password = '';
				// FIN DES DONNEES
				
				$db = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $user, $password, $pdo_options);
				//return $db;	
			}catch (Exception $e) {
				die('Erreur de connexion : ' . $e->getMessage());
			}
			
			echo 'Dernieres personnes inscrites : <br/>';
			$reponse = $db->query("SELECT name, description FROM user ORDER BY id DESC LIMIT 5;");
			while($donnees = $reponse->fetch())
			{
				echo $donnees['name'].' : '.$donnees['description'].'<br>';				
			}
			$reponse->closeCursor();
		?>
	</div>	
	<!------------- fin affichage des derniers inscrits (5)------->
	
	<div id="recherche_utilisateur"> 
		<form action="index.php" method="post">
			<label><input type="text" name="nom_recherche" id="nom_recherche" placeholder="un Alien"" /></label> <!-- la recherche ignore la casse-->
			<input type="submit" value="Rechercher un Alien" />
		</form>
	</div>

	
	<?php
	
	/******fonction de recherche de l'utilisateur**********/
		if (isset($_POST['nom_recherche']))
		{	
			try{
				$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				// INFORMATIONS DE CONNEXION
				$host = 	'localhost';
				$dbname = 	'projet';
				$user = 	'root';
				$password = '';
				// FIN DES DONNEES
				
				$db = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $user, $password, $pdo_options);
				//return $db;	
			} catch (Exception $e) {
				die('Erreur de connexion : ' . $e->getMessage());
			}
			
			
			
			$sql = $db->prepare('
				SELECT * FROM user WHERE name = :name;
			');
			$sql->execute(array(
				'name' => $_POST['nom_recherche']
			));
			
			$countUser = $sql->rowCount();

			if($countUser != 0)
			{					
				while($donnees = $sql->fetch())
				{
					echo '<div id="affiche_recherche_utilisateur">'.$donnees['name'].' : <br/> @mail : '.$donnees['email'].' <br/> '.$donnees['gender'].' <br/>  '.$donnees['description'].'<br></div>';				
				}
				$sql->closeCursor();
			}
			else if($_POST['nom_recherche']==""){}
			else
			{
				echo '<div id="affiche_recherche_utilisateur">'."Aucun Alien n'a ce nom :'(".'</div>';				
			}			
		}
	/***********fin de la zonne de recherche***********/	
	
	
	
		
	/* L'UTILISATEUR EST CONNECTE :
	 on affiche les fonctionnalités utilisateurs (menu déroulant
	 											 + section (sous-page) appellée (section par défaut = la liste des utilisateurs inscrits) */
												  

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
					    <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?page=home&section=myprofile"><span class="glyphicon glyphicon-user"></span><?php echo _(' My Profile '); ?></a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?page=home&section=mymessages"><span class="glyphicon glyphicon-envelope"></span><?php echo _(' My Messages '); ?></a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?page=home&section=userslist"><span class="glyphicon glyphicon-globe"></span><?php echo _(' My friends '); ?></a></li>
					 	<li role="presentation"><a role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-comment"></span><?php echo _(' Chatting Room '); ?></a></li>					  
					  </ul>
					</div>
				</div>



				  <!-- INCLUSION DES SECTIONS (SOUS-PAGES) -->

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
			

			<!-- FIN inclusion de section en mode CONNECTE -->


			
			<?php } else { ?>

			<!-- AFFICHAGE DE LA PRESENTTION DU SITE LORSQU'UN VISITEUR N'EST PAS CONNECTE -->


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
			
			<?php } ?>

			<!-- FIN inclusion préentation du site en mode DECCONECTE -->
