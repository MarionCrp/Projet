<?php include('controller/signup_controller.php') ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>World & I - Sign Up </title>
</head>

<body>	

	<div class="row">
	  <div class="col-md-3"></div>
	  <div class="col-md-6">

	  	<div class="panel panel-default">
		 	<div class="panel-heading">
		   		 <h3 class="panel-title">Créer un compte utilisateur</h3>
		  	</div>
		  
		 	<div class="panel-body">
		 		<p> * Mention Obligatoire </p>

			 	<form  action="" method="post" class="form-horizontal" role="form">
					  <div class="form-group">
						<label for="name" class="col-sm-2 control-label">Pseudo *</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name="name" placeholder="Pseudo">
						    </div>
					  </div>

					  <div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email *</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name="email" placeholder="Email">
						    </div>
					  </div>

					  <div class="form-group">
					    <label for="password" class="col-sm-2 control-label">Mot de Passe *</label>
						    <div class="col-sm-10">
						      <input type="password" class="form-control" name="password" placeholder="Password">
						    </div>
					  </div>

					  <div class="form-group">
					    <label for="confirmed_pw" class="col-sm-2 control-label"> * </label>
						    <div class="col-sm-10">
						      <input type="password" class="form-control" name="confirmed_pw" placeholder="Confirmer le Mot de Passe">
						    </div>
					  </div>

					  <div class="form-group">
					  	<label for="gender" class="col-sm-2 control-label"> Sexe *</label>
					  		<div class="col-sm-10">
							  <select class="form-control" name="gender" id="gender">
								  <option value="male">Homme</option>
								  <option value="female">Femme</option>
							  </select>
							</div>
					</div>

					 <div class="form-group">
					 	   <label for="description" class="col-sm-2 control-label">Présentation</label>
						    <div class="col-sm-10">
						      <textarea class="form-control" rows="3" placeholder="Parlez-nous de vous!" name="description"></textarea>
						    </div>
					  </div>

					  

					   <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      <input class="btn btn-default" type="submit" value="Créer mon compte" name="create_account"/>
						     	<!-- <button class="btn btn-default" name="create_account">S'inscrire</button> -->
						     </div>
		 			   </div>
				</form>

					<hr/>

					<form action="index.php" method="post">
					<button type="submit" class="btn btn-default">Retour à l'accueil</button>
					</form>
		 	</div><!-- Form-Panel-Body -->
		</div><!-- panel panel-default -->
	</div> <!-- col-md-6 -->
	<div class="col-md-3"></div>
</div> <!-- row -->


			<!-- Date de Naissance : 
				<select name="day" id="day">
				<?php $form->day() ?>
				</select>

				<select name="month" id="month">
					<option value="january"> Janvier </option>
					<option value="february"> Février </option>
					<option value="march"> Mars </option>
					<option value="april"> Avril </option>
					<option value="may"> Mai </option>
					<option value="june"> Juin </option>
					<option value="july"> Juillet </option>
					<option value="august"> Août </option>
					<option value="september"> Septembre </option>
					<option value="october"> Octobre </option>
					<option value="november"> Novembre </option>
					<option value="december"> Décembre </option>
				</select>

				<select name="year" id="year">
				<?php $form->year() ?>
				</select><br/> -->
