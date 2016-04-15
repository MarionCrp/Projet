<?php 
include_once('autoload.php');


?>


<!DOCTYPE html>
<html>

	<HEAD> 


		<meta charset="utf-8"/>
		<meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" href="assets/css/css/bootstrap.css"/>
		<link rel="stylesheet" href="assets/css/css/bootstrap.js"/>
		<script src="//code.jquery.com/jquery-1.12.0.min.js"></script> <!-- Pour le menu déroulant notamment -->
		<link rel="stylesheet" href="assets/css/css/style_2.css"/>
		<Title><?php echo _("  Meet An Alien - Index "); ?> </title>

		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>




	</HEAD>

	
	<body>


	<?php if(isset($_POST['lang'])) echo $_POST['lang']; ?>
	 <!-- ***** BARRE DE NAVIGATION ***** -->
    <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Meet An Alien</a>
        </div>

       
        <div id="navbar" class="collapse navbar-collapse"> 
          <ul class="nav navbar-nav navbar-right">

          <?php
          /* La barre de navigation réagit différemment selon si une session est ouverte ou non */

          /* Si l'utilisateur n'est pas connecté, elle affiche les boutons "Connexion" et "Inscription" */
         	 if (!isset($_SESSION['user']))
			{ ?>
				<li <?php if (isset($_GET['page']) AND $_GET['page'] == "signin") echo 'class="active"'; ?> 
				><a href="index.php?page=signin"><?php echo _(" Sign In "); ?></a></li>

				<li <?php if (isset($_GET['page']) AND $_GET['page'] == "signup") echo 'class="active"'; ?> ><a href="index.php?page=signup"> <?php echo _(" Sign up "); ?> </a></li> 
			<?php
			}

			/* Sinon elle affiche le bouton de deconnexion */
			else
			{
				?>
				<li><a href="index.php?page=deconnexion"><?php echo _(" Sign Out "); ?>  </a></li>
				<?php
			}

				
			?>
				<li <?php if (isset($_GET['lang']) AND $_GET['lang'] == "fr_FR") echo 'class="active"'; ?> 
				><a href="index.php?page=change_locale&lang=fr_FR"><img src="assets/images/flags/french.png" alt="French" class="flags"  ></a></li>
				<li <?php if (isset($_GET['lang']) AND $_GET['lang'] == "en_US") echo 'class="active"'; ?> 
				><a href="index.php?page=change_locale&lang=en_US"><img src="assets/images/flags/english.png" alt="English" class="flags"></a></li>  
		   </ul>

        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
    <!-- FiN DE BARRE DE NAVIGATION -->

    <!-- ***** CONTENU DU SITE ***** -->

    <div class ="center">
	    <div class="container">

	   		<!-- ***** BANDEAU DE RECHERCHE D'UTILISATEURS ***** -->

	    	<div id ="zone_opacity"> 

					<div class="row">

							<div class="col-md-4"> 
								 <div class="form-group">
								    <label class="sr-only" for="exampleInputEmail2"></label>
								    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="			<?php echo _("Please enter your city") ;?> ">
								 </div>
							</div>
							


						<div class="col-md-4">
							  <div class="form-group">
							    <div class="input-group">
							      	<div class="input-group-addon"><?php echo gettext(" I want to meet someone speaking "); ?></div>
							    </div>
							  </div>
						</div>

						<div class="col-md-4">
							 <div class="form-group"> 
								<select class="form-control">
								  <option>English</option>
								  <option>Français</option>
								</select>
							 </div>
							
						</div>
					</div>
				</div> 

		<!-- / FIN bandeau de recherche utilisateur -->



			<!-- ***** INCLUSION DE PAGE ***** -->
			<!-- les différentes pages appelées par l'utilisateur sont intégrée ici -->
			<!-- page par défaut : "home" (si l'utilisateur est connecé : menu + liste d'utilisateurs inscrits
										   sinon, la présentation du site) -->

	   		<?php

				if(isset($_GET['page'])) 
				{
					$page = $_GET['page'];
				}

				else 
				{
					$page = 'home';
				}

				include ('view/'.$page.'.php');
			?>

			<!-- FIN inclusion de page  -->

		 	
	    </div><!--/.container-->
	</div> <!--/.center-->


</body>
		 

<!-- BAS DE PAGE  -->

<footer class="footer">

	<div class="row">
  


		<div class="col-md-4">
		<div class="footer-part text-center">
			<h1><?php echo _(" Need some help ? "); ?></h1>
			<div class ="element_footer"><a href =Moovincity-accueil.html><?php echo _(" Contact us "); ?></a> </div>
			<div class ="element_footer"><a href =Moovincity-accueil.html><?php echo _(" FAQ "); ?>  </a> </div>
			<div class ="element_footer"><a href =Moovincity-accueil.html><?php echo _(" Terms and Conditions "); ?>  </a> </div>
			<div class ="element_footer"><a href =Moovincity-accueil.html><?php echo _("  Legal informations "); ?> </a> </div>
			<div class ="element_footer"><a href =Moovincity-accueil.html><?php echo _(" Site map "); ?>  </a> </div>
			</div>
		</div>
			
		<div class="col-md-4">
			<div class="footer-part text-center">
				<h1><?php echo _(" Mobile Version "); ?></h1>
				<div class ="element_footer"><a href =Moovincity-accueil.html><?php echo _(" App for Iphone "); ?>   </a> </div>
				<div class ="element_footer"><a href =Moovincity-accueil.html><?php echo _(" App for Android "); ?>   </a> </div>
			</div>
		</div>
			
		<div class="col-md-4">
		<div class="footer-part text-center">
			<h1> <?php echo _(" Working with us "); ?></h1>
			<div class ="element_footer"><a href =Moovincity-accueil.html><?php echo _(" Business propositions "); ?>  </a> </div>
			<div class ="element_footer"><a href =Moovincity-accueil.html><?php echo _(" Partnerships "); ?>  </a> </div>
			<div class ="element_footer"><a href =Moovincity-accueil.html><?php echo _(" Employment opportunities "); ?> </a> </div>
			</div>
		</div>
	</div>

</footer> 
<!-- / FIN BAS DE PAGE  -->
</html>

