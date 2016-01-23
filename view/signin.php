<?php include('controller/signin_controller.php') ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>World & I - Sign In </title>
</head>

<body>	

	<div class="row">
	  <div class="col-md-3"></div>
	  <div class="col-md-6">

	  	<div class="panel panel-default">
		 	<div class="panel-heading">
		   		 <h3 class="panel-title">Connexion</h3>
		  	</div>
		  
		 	<div class="panel-body">

		 	<form  action="" method="post" class="form-horizontal" role="form">
			  <div class="form-group">
				<label for="email" class="col-sm-2 control-label">Email</label>
				    <div class="col-sm-10">
				      <input type="email" class="form-control" name="email" placeholder="Email">
				    </div>
			  </div>
			  <div class="form-group">
			    <label for="password" class="col-sm-2 control-label">Mot de Passe</label>
				    <div class="col-sm-10">
				      <input type="password" class="form-control" name="password" placeholder="Password">
				    </div>
			  </div>
			   <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-default" name="connexion">Se Connecter</button>
				    </div>
 			   </div>

					</form>

					<hr/>

					<form action="index.php" method="post">
					<button type="submit" class="btn btn-default">Retour à l'accueil</button>
					</form>
		 	</div>
		</div>

	  </div>

		  <div class="col-md-3"></div>
	</div>