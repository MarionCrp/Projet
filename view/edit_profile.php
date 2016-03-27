<!-- FORMULAIRE DE MODIFICATION DE COMPTE -->

	  	<div class="panel panel-default">
		 	<div class="panel-heading">
		   		 <h3 class="panel-title"><?php echo _(" Edit you account "); ?></h3>
		  	</div>
		  
		 	<div class="panel-body">

	<!-- inclusion du controlleur contenant les fonctions relatives à l'édition du profil)  -->
	<?php include('controller/edit_profile_controller.php') ; ?>

	<div class="container">	
		<form action="" method="post">
			<?php echo _(" Name "); ?> : 
				<input type ="text" name="name" maxlength="50" <?php echo 'value="'. $current_user->name() .'" ' ; ?>/>
				<input type="submit" value=<?php echo _(" Edit "); ?> name="edit_profile"/><br/>
		</form>

		<form action="" method="post">
			Email Adress : 
				<input type="text" name="email" maxlength="50" <?php echo 'value="' .$current_user->email().'"' ;?>/> 
				<input type="submit" value=<?php echo _(" Edit "); ?> name="edit_profile"/><br/>
		</form>

		<form action="" method="post">
			<?php echo _(" Gender "); ?> : 
				<select name="gender" id="gender">
					<option value="male" 
					<?php if ($current_user->gender() == 'male') echo 'selected'; ?> > <?php echo _(" Male "); ?></option>
					<option value="female" 
					<?php if ($current_user->gender() == 'female') echo 'selected'; ?> > <?php echo _(" Female "); ?></option>
				</select>
				<input type="submit" value=<?php echo _(" Edit "); ?> name="edit_profile"/><br/>
		</form>
	</div>

	<div class="container">	
		<form action="" method="post">

			<?php echo _(" Current Password "); ?> : 
				<input type="password" name="current_password" maxlength="50"/><br/>

			<?php echo _(" New Password "); ?>
				<input type="password" name="new_password" maxlength="50"/><br/>

			<?php echo _(" Confirm Password "); ?> 
				<input type="password" name="confirmed_pw" maxlength="50"/><br/> 
			<input type="submit" value=<?php echo _(" Edit password "); ?> name="edit_password"/><br/>

		</form>
	</div>


		<form action="" method="post">
			<p><?php echo _(" Tell more about yourself "); ?><br/>
				<textarea name="description" id="description" rows="10" cols="60" /></textarea></p>
				<input type="submit" value=<?php echo _(" Edit your description "); ?> name="edit_profile"/><br/>
		</form>
		<!-- <form action="" method="post"><input type="submit" value="Supprimer mon compte" name="delete_account"></form> -->
		 	</div><!-- Form-Panel-Body -->
		</div><!-- panel panel-default -->
	</div> <!-- col-md-6 -->
	<div class="col-md-3"></div>
</div> <!-- row