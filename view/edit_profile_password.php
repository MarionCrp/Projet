	<!-- inclusion du controlleur contenant les fonctions relatives à l'édition du mot de passe)  -->
	<?php include('/controller/edit_profile_password_controller.php') ; ?>

		<form action="#" method="post" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-4 control-label"><?php echo _(" Current Password "); ?></label>
					<div class="col-sm-8">
						<input type="password" class="form-control" name="current_password" maxlength="50" value=""/><br/>
					</div>

				<label  class="col-sm-4 control-label"><?php echo _(" New Password "); ?></label>
					<div class="col-sm-8">
						<input type="password" class="form-control" name="new_password" maxlength="50"/><br/>
					</div>

				<label class="col-sm-4 control-label"><?php echo _(" Confirm Password "); ?> </label>
					<div class="col-sm-8">
						<input type="password" class="form-control" name="confirmed_pw" maxlength="50"/><br/> 
					</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-4">
						<input class="btn btn-primary" type= "submit" value= "<?php echo _(" Edit Password "); ?>" name="edit_password"/><br/>
					</div>
				</div>
			</div>
		</form>