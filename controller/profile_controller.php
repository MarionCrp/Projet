<?php

$user_id = (int)htmlspecialchars($_GET['id']);

if(!$user_manager->exists($user_id, 'id')){
	$user_found = false;
	echo "<script type='text/javascript'> document.location.replace('index.php?page=home&section=user_not_found'); </script>";
} else {
	$user_found = true;
	$user = $user_manager->getDatas($user_id);
	$title = $user->name();
	
	$spoken_languages = $spoken_language_manager->getUsersLanguages($user->id());
	if($spoken_languages){
		foreach($spoken_languages as $spoken_language) {
			$level = $level_manager->getLevel($spoken_language->levelId());
			$language = $language_manager->getLanguage($spoken_language->Languageid())->name();
			$spokenLanguages[] = array(
				'language' => $language,
				'level' => $level
				);
		}
	} else {
		echo '<p>'._('No language has been added').'</p>';
	}
		
}