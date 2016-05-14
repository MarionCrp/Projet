<?php

// On stoque dans l'array $users, la liste des utilisateurs isncrits
if(isset($_GET['pagenb'])){
	$page = $_GET['pagenb'];
} else {
	$page = 1;
}
if(isset($_POST['search_user'])){
	if(empty($_POST['cityName']) OR empty($_POST['languageId'])){
		throw new Exception('Please fill in all the fields');
	}
	else {
		$languageId = htmlspecialchars($_POST['languageId']);
		$cityName = htmlspecialchars($_POST['cityName']);

		try {
			$cityId = $city_manager->getCity($cityName)->id();
		} catch (Exception $e){
			echo $e->getMessage();
		}
		var_dump($list_params = $user_manager->getList($page, $languageId, $cityId));
		$users = $list_params['list_per_page'];
		$nb_users = $list_params['total_found'];
	}
	
} else {
	$list_params = $user_manager->getList($page);
	$users = $list_params['list_per_page'];
	$nb_users = $list_params['total_found'];

}
