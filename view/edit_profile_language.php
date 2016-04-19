<?php
include('./controller/edit_profile_language_controller.php');
?>

<fieldset>
	<legend> <?php echo _('Spoken Language'); ?> </legend>
		<div class="form-inline">
		 <div id="tab" class="form-group">
		  <label for="languages_id[]" class="col-sm-2"> <?php echo _('Languages'); ?> </label>
			  <div class="col-sm-10">
			  	<?php language_form($current_user, $db); ?>				  
			  </div>
		 </div>
	   </div>

   <div class="form-group">
	    <div class="col-sm-offset-1 col-sm-10">
	      <input class="btn btn-link" value="<?php echo _('Add a Language'); ?>" onclick="ajouteLigne();"/>
	    </div>
   </div>	

   <div class="form-group">
	<div class="col-sm-offset-1 col-sm-10">
		<input class="btn btn-default" type= "submit" value=<?php echo _(" Edit "); ?> name="edit_general"/><br/>
	</div>
</div>
</fieldset>

