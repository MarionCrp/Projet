<?php
include('./controller/edit_profile_language_controller.php');
?>

<form action="#" method="post" class="form-horizontal">
	<fieldset>
		<legend> <?php echo _('Spoken Language'); ?> </legend>
			<div class="form-inline">
			 <div id="tab" class="form-group">

				  	<?php language_form($current_user, $db); ?>				  

				  <div id="to_clone" style="display:none;">
					  <select class="form-control" name="languages_id[]" id="languages_id">
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

	   <div class="form-group">
		    <div class="">
		     <div  class="btn btn-default" id="add_button"> <?php echo _('Add a Language'); ?> </div>
		    </div>
		</div>

	   <div class="form-group">
		<div class="">
			<input class="btn btn-primary" type= "submit" value="<?php echo _(" Edit Languages "); ?>"I4 name="edit_language"/><br/>
		</div>
	</div>
	</fieldset>
</form>
