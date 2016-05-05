<?php 		// On récupère les langues parlées par un utilisateur dans un array.
		$spoken_languages = $spoken_language_manager->getUsersLanguages($current_user->id());
		foreach($spoken_languages as $spoken_language) {
			$level = $level_manager->getLevel($spoken_language->levelId());
			$language = $language_manager->getLanguage($spoken_language->Languageid())->name();
			$spokenLanguages[] = array(
				'language' => $language,
				'level' => $level
				);
		}