<?php 
	function display_language_level(User $user, SpokenLanguageManager $spoken_language_manager){
		// On récupère les langues parlées par un utilisateur dans un array.
		$spoken_languages = $spoken_language_manager->getUsersLanguages($user);
		foreach($spoken_languages as $spoken_language) {
			$level = $spoken_language->level();
			$language = $spoken_language->language()->name();
			 echo '<p>'.$language.'</p>';
			 Form::level_form($level);
		}
	}