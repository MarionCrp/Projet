	<!-- inclusion du controlleur contenant les fonctions relatives à l'édition du profil)  -->
	<?php include('/controller/edit_profile_general_controller.php') ; ?>


	<form action="#" method="post" class="form-horizontal">
		<div class="form-group">
			<label class="col-sm-2 control-label"><?php echo _('Name'); ?></label>
			 <div class="col-sm-10">
			    <input type="text" class="form-control" name="name" <?php echo 'value="'. $current_user->name() .'" ' ; ?>/>
			 </div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label"><?php echo _('Email Adress'); ?></label>
			 <div class="col-sm-10">
			   <input type="text" class="form-control" name="email" maxlength="50" <?php echo 'value="' .$current_user->email().'"' ;?>/>
			 </div> 
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label"><?php echo _(" Gender "); ?></label>
			 <div class="col-sm-10">
				<select name="gender" id="gender" class="form-control">
					<option value="male"
					<?php if ($current_user->gender() == 'male') echo 'selected'; ?> > <?php echo _(" Male "); ?></option>
					<option value="female" 
					<?php if ($current_user->gender() == 'female') echo 'selected'; ?> > <?php echo _(" Female "); ?></option>
				</select>
			  </div>
	    </div>

		<div class="form-group">
			<label for="description" class="col-sm-2 control-label"><?php echo _(" Tell more about yourself "); ?> </label><br>
			 <div class="col-sm-10">
				<textarea name="description" class="form-control" id="description" rows="10" cols="60"><?php echo $current_user->description(); ?></textarea>
			 </div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-4">
				<input class="btn btn-primary" type= "submit" value=<?php echo _(" Edit "); ?> name="edit_general"/><br/>
			</div>
		</div>
	</form>