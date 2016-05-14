<?php

$user_id = (int)htmlspecialchars($_GET['id']);

$user_manager->exists($user_id, 'id');

if($user_manager->exists($user_id, 'id')){
	$user_found = true;
	$user = $user_manager->getDatas($user_id);
	$title = _($user->name().'\'s Profile');
	
	$spoken_languages = $spoken_language_manager->getUsersLanguages($user->id());
		foreach($spoken_languages as $spoken_language) {
			$level = $level_manager->getLevel($spoken_language->levelId());
			$language = $language_manager->getLanguage($spoken_language->Languageid())->name();
			$spokenLanguages[] = array(
				'language' => $language,
				'level' => $level
				);
		}
} else {
	$user_found = false;
	$title = 'No profil found';
}