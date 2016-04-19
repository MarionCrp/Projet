	<?php
	
	
		
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
					 	<li role="presentation"><a role="menuitem" tabindex="-1" href="view/chat.php"><span class="glyphicon glyphicon-comment"></span><?php echo _(' Chatting Room '); ?></a></li>					  
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
			
			<!--- style pour l'affichage des inscrits--->
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
	
			
?>
			<!-- FIN inclusion de section en mode CONNECTE -->


			
			<?php } else { ?>

			<!-- AFFICHAGE DE LA PRESENTTION DU SITE LORSQU'UN VISITEUR N'EST PAS CONNECTE -->


				<div class="jumbotron">
						<p> 
                        
                        <H2> <?php echo _(' Welcome to our supervised project. This project is a multicultural meeting Website. Its purpose is to link together :'); ?> </H2>
							<br/>
							<li><?php echo _('People with different nationalities to allow cultural and linguistic exchanges.'); ?></li>
							<li><?php echo _('People with a common nationality for expatriates who miss their countries ! '); ?></li>
							<br/>
							<?php echo _('We are three students in informatics (Bachelor), and we are beginners in Web programming.'); ?>
							<br/>
							<?php echo _('This project is an opportunity for us to **learn**  and  **apply** directly languages we are working on during courses. '); ?>
							<br/>
							<H2><?php echo _('Technologies used previously :'); ?></H2>
							<br/>
							<li><?php echo _('HTML5 / CSS3 / Bootstrap'); ?></li>
							<li><?php echo _('PHP ( object oriented programming )'); ?></li>
							<li><?php echo _('MySQL'); ?></li>
							<li><?php echo _('Javascript (jQuery/Ajax)'); ?></li>
							<?php echo _('The purpose being to get the code evolving regarding the technologies learnt at our university and self-study ( including MVC model ... )'); ?>
							<br/>
							<br/>
							<?php echo _('Marion, Kévin and Loïc'); ?><br/>
            
                                
						</p>

				</div>
			
			<?php } ?>

			<!-- FIN inclusion préentation du site en mode DECCONECTE -->
