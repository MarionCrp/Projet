<?php
function language_form($current_user, $db){
	$spoken_language_manager = new SpokenLanguageManager($db);
	$language_manager = new LanguageManager($db);
	$spoken_languages = $spoken_language_manager->getUsersLanguages($current_user);
	if (empty($spoken_languages)) echo '<p class="fail">'._('You have not yet added language').'</p>';
	else {
		foreach($spoken_languages as $spoken_language){
			$languageid = $spoken_language->language()->id();
			$levelid = $spoken_language->level()->id();
		?>
			<select class="col-sm-10 form-control" name="languages_id[]" id="languages_id">
						<?php Form::languages($language_manager, $languageid); ?>
		    </select>
			<select class="col-sm-10 form-control" name="levels_id[]" id="levels_id">
				<option value="1" <?php if($levelid == 1) echo 'selected'; ?>><?php echo _('Beginner'); ?></option>
				<option value="2" <?php if($levelid == 2) echo 'selected'; ?>><?php echo _('Intermediate'); ?></option>
				<option value="3" <?php if($levelid == 3) echo 'selected'; ?>><?php echo _('Advanced'); ?></option>
				<option value="4" <?php if($levelid == 4) echo 'selected'; ?>><?php echo _('Fluent'); ?></option>
				<option value="5" <?php if($levelid == 5) echo 'selected'; ?>><?php echo _('Mother Tong'); ?></option>
			</select>
			<input class="btn btn-link" value="<?php echo _('Delete the Language'); ?>" onclick="suppression()"/>
		<?php
		}
	}
}

