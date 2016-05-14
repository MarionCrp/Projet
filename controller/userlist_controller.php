<?php

// On stoque dans l'array $users, la liste des utilisateurs isncrits


if(isset($_GET['pagenb'])){
	$page = (int)$_GET['pagenb'];
} else {
	$page = 1;
}

if(isset($_GET['cityName']) AND isset($_GET['languageId'])){
	if(empty($_GET['cityName']) OR empty($_GET['languageId'])){

		
	}
	else {

		$languageId = htmlspecialchars($_GET['languageId']);
		$cityName = htmlspecialchars($_GET['cityName']);

		try {
			$cityId = $city_manager->getCity($cityName)->id();
		} catch (Exception $e){
			echo $e->getMessage();
		}
		$list_params = $user_manager->getList($page, $languageId, $cityId);
		$users = $list_params['list_per_page'];
		$nb_users = $list_params['total_found'];
	}
	
} else {
	$list_params = $user_manager->getList($page);
	$users = $list_params['list_per_page'];
	$nb_users = $list_params['total_found'];
}
