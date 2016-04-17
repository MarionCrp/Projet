<!-- inclusion du controlleur contenant les fonctions relatives à l'édition du profil)  -->
<?php
		include('/controller/edit_profile_localization_controller.php') ; 
?> 


	<form action="#" method="post" class="form-horizontal">
		<legend><?php echo _("Where do you live ?"); ?></legend>
		<?php if(isset($error)) echo $error; ?>
		<p><?php echo _('Are you still living in <b>'.$city_manager->getCityName($current_user->cityId()).'</b> ? If not, edit your current place below filling the form.'); ?></p>
		  <div class="form-group">
			  <label for="country" class="col-sm-2 control-label"> <?php echo _('Country'); ?> </label>
				  <div class="col-sm-10">
					  <select name="country" class="countries form-control" id="countryId">
							<option value=""> <?php echo _('Select Country'); ?> </option>
					  </select>
				  </div>

		  </div>
		  <div class="form-group">
			  <label for="state" class="col-sm-2 control-label"> <?php echo _('State'); ?> </label>
			  	<div class="col-sm-10">
						<select name="state" class="states form-control" id="stateId">
							<option value=""> <?php echo _('Select State'); ?></option>
						</select>
					</div>
			</div>

			<div class="form-group">
				<label for="city" class="col-sm-2 control-label"> <?php echo _('City'); ?> </label>
					<div class="col-sm-10">
						<select name="city" class="cities form-control" id="cityId">
							<option value=""> <?php echo _('Select City'); ?></option>
						</select>
					</div>
			</div>
		</fieldset>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="./assets/js/location.js"></script>

	<fieldset>
		 <legend>Where are you from ?</legend>
			 <div class="form-group">
				  <label for="nationality" class="col-sm-2 control-label"> <?php echo _('Nationality'); ?> </label>
					  <div class="col-sm-10">
						  <select name="nationality" class="form-control" id="nationality">
								<option value="">Select Country</option>
								<?php Form::nationality_form($db, $current_user->nationalityId()) ?>
						  </select>
					  </div>
			  </div>
		</fieldset>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-4">
				<input class="btn btn-default" type= "submit" value=<?php echo _(" Edit "); ?> name="edit_localization"/><br/>
			</div>
		</div>
	</form>
