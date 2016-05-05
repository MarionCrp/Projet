<?php
function language_form($current_user, $db){
	$spoken_language_manager = new SpokenLanguageManager($db);
	$language_manager = new LanguageManager($db);
	$spoken_languages = $spoken_language_manager->getUsersLanguages($current_user->id());
	if (empty($spoken_languages)) echo '<p class="fail">'._('You have not yet added language').'</p>';
	else {
		foreach($spoken_languages as $spoken_language){
			$languageid = $spoken_language->languageId();
			$levelid = $spoken_language->levelId();
		?>
		<div>
			<select class="languages_nb col-sm-10 form-control" name="languages_id[]" id="languages_id">
				<?php Form::languages($language_manager, $languageid); ?>
		    </select>
			<select class="col-sm-10 form-control" name="levels_id[]" id="levels_id">
				<option value="1" <?php if($levelid == 1) echo 'selected'; ?>><?php echo _('Beginner'); ?></option>
				<option value="2" <?php if($levelid == 2) echo 'selected'; ?>><?php echo _('Intermediate'); ?></option>
				<option value="3" <?php if($levelid == 3) echo 'selected'; ?>><?php echo _('Advanced'); ?></option>
				<option value="4" <?php if($levelid == 4) echo 'selected'; ?>><?php echo _('Fluent'); ?></option>
				<option value="5" <?php if($levelid == 5) echo 'selected'; ?>><?php echo _('Mother Tong'); ?></option>
			</select>
			 <span class="delete_button btn btn-link"><?php echo _('Delete the Language'); ?></span>
			</div>
		<?php
		}
	}
}

/**
* Gestion de l'édition des attributs de langues
**/

if (isset($_POST['edit_language'])){
	$selected_languages = $_POST['languages_id'];
	$is_all_empty = true;
	foreach ($selected_languages as $lang) {
		if($lang != ''){
			$is_all_empty = false;
		}
	}
	if(isset($_POST['languages_id']) AND ($_POST['levels_id'] AND $is_all_empty == false)){
		$languageArray = array();
		foreach (array_combine($_POST['languages_id'], $_POST['levels_id']) as $languageid => $levelid) {
			if($languageid != null){
				$languageArray[] = new SpokenLanguage(array(
					'userId' => $current_user->id(),
					'languageId' => $languageid,
					'levelId' => $levelid
					));
				$spoken_language_manager->modifyLanguage($current_user->id(), $languageid, $levelid);
			}
		}
		$spoken_language_manager->compareAndDeleteEditedLanguages($languageArray);
	} else {
		echo ('<p style="color:red;">' ._('Please specify at least one language.').  '</p>');
	}
}

?>


