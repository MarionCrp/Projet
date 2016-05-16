<?php

// On stoque dans l'array $users, la liste des utilisateurs isncrits
$user_per_page = 6;

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
		$list_params = $user_manager->getList($user_per_page, $page, $languageId, $cityId);
		$users = $list_params['list_per_page'];
		//On retire le current user de la liste des profils (qui ne sera pas afficher de toute manière).
		$nb_users = $list_params['total_found'] -1;
	}
	
} else {
	$list_params = $user_manager->getList($user_per_page, $page);
	$users = $list_params['list_per_page'];
	$nb_users = $list_params['total_found'] - 1;
}
