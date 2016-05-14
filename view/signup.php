
<!-- Inclusion du controleur relatif à l'inscription' -->
<?php include('controller/signup_controller.php') ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Meet an Alien - <?php echo _('Sign Up'); ?> </title>
</head>

<body>	

	<!-- FORMULAIRE D'INSCRIPTION -->

	<div class="row">
	  <div class="col-md-2"></div>
	  <div class="col-md-8 deconnected">

	  	<div class="panel panel-default">
		 	<div class="panel-heading">
		   		 <h3 class="panel-title"><?php echo _('Sign up'); ?> </h3>
		  	</div>
		  
		 	<div class="panel-body">
		 		<p style="color:red;"> * <?php echo _('Required fields'); ?> </p>
		 		<?php if(isset($error)) echo $error; ?>
			 	<form  action="#" method="post" class="form-horizontal" role="form">
					  <div class="form-group">
						<label for="name" class="col-sm-2 control-label"><?php echo _('Name'); ?> *</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name="name" placeholder="Pseudo">
						    </div>
					  </div>

					  <div class="form-group">
						<label for="email" class="col-sm-2 control-label"><?php echo _('Email'); ?> *</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name="email" placeholder="Email">
						    </div>
					  </div>

					  <div class="form-group">
					    <label for="password" class="col-sm-2 control-label"><?php echo _('Password'); ?> *</label>
						    <div class="col-sm-10">
						      <input type="password" class="form-control" name="password" placeholder="Password">
						    </div>
					  </div>

					  <div class="form-group">
					    <label for="confirmed_pw" class="col-sm-2 control-label"> * </label>
						    <div class="col-sm-10">
						      <input type="password" class="form-control" name="confirmed_pw" placeholder= "<?php echo _('Password Confirmation'); ?>" >
						    </div>
					  </div>

					  <div class="form-group">
					  	<label for="gender" class="col-sm-2 control-label"> <?php echo _('Gender'); ?> *</label>
					  		<div class="col-sm-10">
								  <select class="form-control" name="gender" id="gender">
									  <option value="male"><?php echo _('Male'); ?></option>
									  <option value="female"><?php echo _('Female'); ?></option>
								  </select>
								</div>
						</div>

						<div class="form-group">
					 	   <label for="description" class="col-sm-2 control-label"><?php echo _('Description'); ?></label>
						    <div class="col-sm-10">
						      <textarea class="form-control" rows="3" placeholder="<?php echo _('Talk about yourself'); ?>" name="description"></textarea>
						    </div>
					  </div>

					  <fieldset>
   					 <legend><?php echo _('Where do you live ?'); ?></legend>
						  <div class="form-group">
							  <label for="country" class="col-sm-2 control-label"> <?php echo _('Country'); ?> </label>
								  <div class="col-sm-10">
									  <select name="country" class="countries form-control" id="countryId">
											<option value="">Select Country</option>
									  </select>
								  </div>
						  </div>
						  <div class="form-group">
							  <label for="state" class="col-sm-2 control-label"> <?php echo _('State'); ?> </label>
							  	<div class="col-sm-10">
										<select name="state" class="states form-control" id="stateId">
											<option value="">Select State</option>
										</select>
									</div>
							</div>

							<div class="form-group">
								<label for="city" class="col-sm-2 control-label"> <?php echo _('City'); ?> </label>
									<div class="col-sm-10">
										<select name="city" class="cities form-control" id="cityId">
											<option value="">Select City</option>
										</select>
									</div>
							</div>
						</fieldset>

					<fieldset>
   					 <legend><?php echo _('Where are you from ?'); ?></legend>
	   					 <div class="form-group">
								  <label for="nationality" class="col-sm-2 control-label"> <?php echo _('Nationality'); ?> </label>
									  <div class="col-sm-10">
										  <select name="nationality" class="form-control" id="nationality">
												<option value="">Select Country</option>
												<?php Form::nationality_form($db) ?>
										  </select>
									  </div>
							  </div>
   					</fieldset>

					<fieldset>
	   					 <legend> <?php echo _('Spoken Language'); ?> </legend>
	   					 <div class="form-group">
	   					 	<label class="col-sm-2 control-label">  </label>
		   					 <div class="form-inline col-sm-10">
								 <div id="tab" >
									  <div id="to_clone" >
										  <select class="languages_nb form-control" name="languages_id[]" id="languages_id">
												<?php Form::languages($language_manager) ?>
										  </select>
										  <select class="form-control" name="levels_id[]" id="levels_id">
										  	<option value="1"><?php echo _('Beginner'); ?></option>
										  	<option value="2"><?php echo _('Intermediate'); ?></option>
										  	<option value="3"><?php echo _('Advanced'); ?></option>
										  	<option value="4"><?php echo _('Fluent'); ?></option>
										  	<option value="5"><?php echo _('Mother Tong'); ?></option>
										  </select>
										  <span class="delete_button btn btn-link"><?php echo _('Delete the Language'); ?></span>
									  </div>
								 </div>
							 </div>
					      </div>

					   <div class="form-group">
					   	<label class="col-sm-2 control-label"> </label>
						    <div class=" col-sm-10">
						     	<div  class="btn btn-default" id="add_button"> <?php echo _('Add a Language'); ?> </div>
						    </div>
	 			  	   </div>
						
					</fieldset>
				
					   <div class="form-group">
						    <!-- <div class="col-sm-offset-1 col-sm-10"> -->

						    <div class="">
						      <input class="btn btn-primary sign_up" type="submit" value="<?php echo _('Sign Up'); ?>" name="create_account"/>
						     </div>
		 			   </div>
				 

				</form>
					<hr/>
					
					<a href="index.php" type="submit" class="btn btn-default"><?php echo _('Go back to the Main page '); ?></a>

		 	</div><!-- Form-Panel-Body -->
		</div><!-- panel panel-default -->
	  </div> <!-- col-md-8 -->
	  <div class="col-md-2"></div>
	</div> <!-- row -->




			<!-- Date de Naissance :   A FAIRE !
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



<!-- FIN formulaire d'inscription -->