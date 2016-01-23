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
		<Title> Alien - Accueil </title>

		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>




	</HEAD>

	
	<body>
    <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Alien</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
          <?php
         	 if (!isset($_SESSION['user'])) 
			{ ?>
				<li <?php if (isset($_GET['page']) AND $_GET['page'] == "signin") echo 'class="active"'; ?> 
				><a href="index.php?page=signin">Connexion</a></li>

				<li <?php if (isset($_GET['page']) AND $_GET['page'] == "signup") echo 'class="active"'; ?> ><a href="index.php?page=signup">Inscription</a></li> 
			<?php
			}
			else
			{
				?>
				<li><a href="index.php?page=deconnexion"> Deconnexion </a></li>
				<?php
			}

				
			?>
		   </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->

    <div class="container">

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
									

     
      <hr>
      
     <!--  <footer>
        <p>&copy; 2015 Company, Inc.</p>
      </footer>
 -->
    </div><!--/.container-->