<!-- FORMULAIRE DE MODIFICATION DE COMPTE -->

	  	<div class="panel panel-default">
		 	<div class="panel-heading">
		   		 <h3 class="panel-title"><?php echo _(" Edit you account "); ?></h3>
		  	</div>
		  
		 	<div class="panel-body">

	<!-- inclusion du controlleur contenant les fonctions relatives à l'édition du profil)  -->
	<?php include('controller/edit_profile_controller.php') ; ?>

	<div class="container">	
		<form action="" method="post" class="form-inline">
		<div class="form-group">
			<label for="name"><?php echo _('Name'); ?></label>
			    <input type="text" class="form-control" name="name"<?php echo 'value="'. $current_user->name() .'" ' ; ?>/>
				<input class="btn btn-default" type="submit" value=<?php echo _(" Edit "); ?> name="edit_profile"/><br/>
		</div>
		</form>

		<form action="" method="post" class="form-inline">
		<div class="form-group">
			<label for="name"><?php echo _('Email Adress'); ?></label>
			   <input type="text" class="form-control" name="email" maxlength="50" <?php echo 'value="' .$current_user->email().'"' ;?>/> 
			   <input class="btn btn-default" type= "submit" value=<?php echo _(" Edit "); ?> name="edit_profile"/><br/>
		</div>
		</form>

		<form action="" method="post" class="form-inline">
		<div class="form-group">
			<label for="name"><?php echo _(" Gender "); ?></label>
				<select name="gender" id="gender" class="form-control">
					<option value="male"
					<?php if ($current_user->gender() == 'male') echo 'selected'; ?> > <?php echo _(" Male "); ?></option>
					<option value="female" 
					<?php if ($current_user->gender() == 'female') echo 'selected'; ?> > <?php echo _(" Female "); ?></option>
				</select>
				<input class="btn btn-default" type= "submit" value=<?php echo _(" Edit "); ?> name="edit_profile"/><br/>
		</form>


	
		<form action="" method="post" class="form-inline">
			<div class="form-group">
			<label for="name"><?php echo _(" Current Password "); ?></label>
				<input type="password" class="form-control" name="current_password" maxlength="50"/><br/>

			<label for="name"><?php echo _(" New Password "); ?></label>
				<input type="password" class="form-control" name="new_password" maxlength="50"/><br/>

			<label for="name"><?php echo _(" Confirm Password "); ?> </label>
				<input type="password" class="form-control" name="confirmed_pw" maxlength="50"/><br/> 
			<input type="submit" class="btn btn-default" value=<?php echo _(" Edit password "); ?> name="edit_password"/><br/>

		</form>
	</div>
		<form action="" method="post" class="form-group">
			<label for="name"><?php echo _(" Tell more about yourself "); ?> </label><br>
				<textarea name="description" class="form-control" id="description" rows="10" cols="60"><?php echo $current_user->description(); ?></textarea></p>
				<input type="submit" class="btn btn-default" value=<?php echo _(" Edit your description "); ?> name="edit_profile"/><br/>
		</form>
		<!-- <form action="" method="post"><input type="submit" value="Supprimer mon compte" name="delete_account"></form> -->
		 	</div><!-- Form-Panel-Body -->
		</div><!-- panel panel-default -->
	</div> <!-- col-md-6 -->
	<div class="col-md-3"></div>
</div> <!-- row