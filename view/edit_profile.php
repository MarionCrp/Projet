<!-- FORMULAIRE DE MODIFICATION DE COMPTE -->

	  	<div class="panel panel-default">
		 	<div class="panel-heading">
		   		 <h3 class="panel-title">Modifier votre compte</h3>
		  	</div>
		  
		 	<div class="panel-body">

	<!-- inclusion du controlleur contenant les fonctions relatives à l'édition du profil)  -->
	<?php include('controller/edit_profile_controller.php') ; ?>

	<div class="container">	
		<form action="" method="post">
			Nom : 
				<input type ="text" name="name" maxlength="50" <?php echo 'value="'. $current_user->name() .'" ' ; ?>/>
				<input type="submit" value="Modifier" name="edit_profile"/><br/>
		</form>

		<form action="" method="post">
			Email : 
				<input type="text" name="email" maxlength="50" <?php echo 'value="' .$current_user->email().'"' ;?>/> 
				<input type="submit" value="Modifier" name="edit_profile"/><br/>
		</form>

		<form action="" method="post">
			Sexe : 
				<select name="gender" id="gender">
					<option value="male" 
					<?php if ($current_user->gender() == 'male') echo 'selected'; ?> > Homme </option>
					<option value="female" 
					<?php if ($current_user->gender() == 'female') echo 'selected'; ?> > Femme </option>
				</select>
				<input type="submit" value="Modifier" name="edit_profile"/><br/>
		</form>
	</div>

	<div class="container">	
		<form action="" method="post">

			Mot de passe Actuel : 
				<input type="password" name="current_password" maxlength="50"/><br/>

			Nouveau mot de passe : 
				<input type="password" name="new_password" maxlength="50"/><br/>

			Confirmer le mot de passe : 
				<input type="password" name="confirmed_pw" maxlength="50"/><br/> 
			<input type="submit" value="Modifier le Mot de Passe" name="edit_password"/><br/>

		</form>
	</div>


		<form action="" method="post">
			<p> Présentez-vous : <br/>
				<textarea name="description" id="description" rows="10" cols="60" /></textarea></p>
				<input type="submit" value="Modifier ma description" name="edit_profile"/><br/>
		</form>
		<!-- <form action="" method="post"><input type="submit" value="Supprimer mon compte" name="delete_account"></form> -->
		 	</div><!-- Form-Panel-Body -->
		</div><!-- panel panel-default -->
	</div> <!-- col-md-6 -->
	<div class="col-md-3"></div>
</div> <!-- row