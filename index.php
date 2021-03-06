<?php
header("Content-Type: application/x-javascript; charset=UTF-8"); 
try {

include_once('autoload.php');

} catch (Exception $e) {

	echo '<div class="alert alert-danger" role="alert"> <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> '.$e->getMessage().'</div>';
}


?>


<!DOCTYPE html>
<html>

	<HEAD> 


		<meta charset="utf-8"/>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="./assets/css/css/bootstrap.css"/>
		<link  rel="stylesheet" href="./assets/css/js/bootstrap.js"/>
		<script src="//code.jquery.com/jquery-1.12.0.min.js"></script> <!-- Pour le menu déroulant notamment -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="./assets/js/location.js"></script>
		
		<!--<script src="./assets/js/message.js"></script>-->
		<link rel="stylesheet" href="assets/css/css/style_2.css"/>
	<!-- <link rel="stylesheet" href="assets/css/css/style_2.css"/> -->
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
          <a class="navbar-brand" href="index.php"> Meet an Alien </a>
        </div>

       
        <div id="navbar" class="collapse navbar-collapse"> 
          <ul class="nav navbar-nav navbar-left">
          	<img id="logo" src="assets/images/logo.PNG" alt="logo-meet-an-alien" width="50" />
          </ul>
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
				<li id="fr" <?php if (isset($_COOKIE['lang']) AND $_COOKIE['lang'] == "fr_FR") echo 'class="langue active"'; ?> 
				><a href="index.php?page=change_locale&lang=fr_FR"><img src="assets/images/flags/french.png" alt="French" class="flags"  ></a></li>
				<li id="en" <?php if (isset($_COOKIE['lang']) AND $_COOKIE['lang'] == "en_US") echo 'class="langue active"'; ?>  
				><a href="index.php?page=change_locale&lang=en_US"><img src="assets/images/flags/english.png" alt="English" class="flags"></a></li>  
		   </ul>

        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
    <!-- FiN DE BARRE DE NAVIGATION -->

    <!-- ***** CONTENU DU SITE ***** -->

    <div class ="center">
	    <div class="container">

			<!-- ***** INCLUSION DE PAGE ***** -->
			<!-- les différentes pages appelées par l'utilisateur sont intégrée ici -->
			<!-- page par défaut : "home" (si l'utilisateur est connecé : menu + liste d'utilisateurs inscrits
										   sinon, la présentation du site) -->

	   		<?php
	   		// Les différentes Routes.
				if(isset($_GET['page'])) {
					$page = htmlspecialchars($_GET['page']);
					switch ($page) {
						case 'home': 
							$page = 'home';
							break;
						case 'signup': 
							$page = 'signup';
							break;
						case 'signin' : 
							$page = 'signin';
							break;
						case 'deconnexion':
							$page = 'deconnexion';
							break;
						case 'change_locale';
							$page = 'change_locale';
							break;
						default :
							$page = '404';
							break;
					}
				} else {
					$page = 'home';
				}
				include ('view/'.$page.'.php');
				
			?>

			<!-- FIN inclusion de page  -->

		 	
	    </div><!--/.container-->
	</div> <!--/.center-->
<footer>

	<div class="container">
		<div class="row">
	  
			<div class="col-md-4">
			<div class="footer-part text-center">
				<h1><?php echo _(" Need some help ? "); ?></h1>
				<div class ="element_footer"><a href =#><?php echo _(" Contact us "); ?></a> </div>
				<div class ="element_footer"><a href =#><?php echo _(" FAQ "); ?>  </a> </div>
				<div class ="element_footer"><a href =#><?php echo _(" Terms and Conditions "); ?>  </a> </div>
				<div class ="element_footer"><a href =#><?php echo _("  Legal informations "); ?> </a> </div>
				<div class ="element_footer"><a href =#><?php echo _(" Site map "); ?>  </a> </div>
				</div>
			</div>
				
			<div class="col-md-4">
				<div class="footer-part text-center">
					<h1><?php echo _(" Mobile Version "); ?></h1>
					<div class ="element_footer"><a href =#><?php echo _(" App for Iphone "); ?>   </a> </div>
					<div class ="element_footer"><a href =#><?php echo _(" App for Android "); ?>   </a> </div>
				</div>
			</div>
				
			<div class="col-md-4">
			<div class="footer-part text-center">
				<h1> <?php echo _(" Working with us "); ?></h1>
				<div class ="element_footer"><a href =#><?php echo _(" Business propositions "); ?>  </a> </div>
				<div class ="element_footer"><a href =#><?php echo _(" Partnerships "); ?>  </a> </div>
				<div class ="element_footer"><a href =#><?php echo _(" Employment opportunities "); ?> </a> </div>
				</div>
			</div>
		</div>
	</div>
	
</footer> 
<!-- / FIN BAS DE PAGE  -->

</body>
		 

<!-- BAS DE PAGE  -->


</html>


<?php 


