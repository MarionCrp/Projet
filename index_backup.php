<?php 

include_once('autoload.php');

?>


<!DOCTYPE html>
<html>

	<HEAD> 
		<meta charset="utf-8"/>
		<meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />

<!-- 		<link rel="stylesheet" href="assets/css/css/bootstrap.css"/> -->
		<link rel="stylesheet" href="assets/css/css/style.css"/>

		<Title> Moov'in City - Accueil </title>
	</HEAD>

	
	<body>
		<div id="wrapper">
			<div id="bloc_page">
				<div id="header">
					<div class ="topbar">
						<div class ="connexion-button">
						<?php
						if (!isset($_SESSION['user'])) 
						{ ?>
							<!-- <button type="button" class="btn btn-secondary">Sign Up</button>
							<button type="button" class="btn btn-secondary">Sign In</button>  -->
							<form action="index.php?page=signin" method="post"><input type="submit" value="Se connecter"></form>
							<p><form action="index.php?page=signup" method="post"><input type="submit" value="Créer un compte"></form>
							<p> Nombre d'utilisateurs inscrits : <?= $user_manager->count(); ?> </p>
							<?php

							}?>
						</div>
						
						<div class ="Flag-button">
							<a href =Moovincity-accueil.html> <img src="assets/images/english_flag.png" alt="english" /> </a>
							<a href =Moovincity-accueil.html> <img src="assets/images/spanish_flag.png" alt="español" /> </a>
						</div>	
					</div>
					
					<div class="logo_nom">
						<div id="logo">
							<img src="assets/images/logo.png" alt="Logo Moov'in City" />
						</div>
						
						<H1>Moov'in City</H1>
					</div>
				</div>
					
					
					
				<div id="content">

					<div id ="zone_recherche">
					
					</div>
					
					<div id ="apres">


					

					</div>
					
				</div>
			</div>	
			
			<div id="footer">
				
				<div id ="help">
					<h1> Need some help ?</h1>
					<div class ="element_footer"> <a href =Moovincity-accueil.html> Contact us </a> </div>
					<div class ="element_footer"><a href =Moovincity-accueil.html> FAQ </a> </div>
					<div class ="element_footer"><a href =Moovincity-accueil.html> Terms and Conditions </a> </div>
					<div class ="element_footer"><a href =Moovincity-accueil.html> Legal informations </a> </div>
					<div class ="element_footer"><a href =Moovincity-accueil.html> Site map </a> </div>
				</div>
					
				<div id ="mobile">
					<h1> Mobile</h1>
					<div class ="element_footer"><a href =Moovincity-accueil.html> App for Iphone later ... </a> </div>
					<div class ="element_footer"><a href =Moovincity-accueil.html> App for Android later ... </a> </div>
					<div class ="element_footer"><a href =Moovincity-accueil.html> Mobile Site later ... </a> </div>
				</div>
					
				<div id ="partnerships">
					<h1> Working with us</h1>
					<div class ="element_footer"><a href =Moovincity-accueil.html> Guides </a> </div>
					<div class ="element_footer"><a href =Moovincity-accueil.html> Business propositions </a> </div>
					<div class ="element_footer"><a href =Moovincity-accueil.html> Partnerships </a> </div>
					<div class ="element_footer"><a href =Moovincity-accueil.html> Employment opportunities </a> </div>
				</div>
				
			</div>
		</div>
	</body>
	
</html>