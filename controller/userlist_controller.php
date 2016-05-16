<?php

// On stoque dans l'array $users, la liste des utilisateurs isncrits
$user_per_page = 6;

if(isset($_GET['pagenb'])){
	$page = (int)$_GET['pagenb'];
} else {
	$page = 1;
}

if(isset($_POST['search_user'])){
	if(empty($_POST['cityName']) OR empty($_POST['languageId'])){
		throw new Exception('Please fill in all the fields');
	}
	else {
		$cityName = htmlspecialchars($_POST['cityName']);
		$languageId = (int)htmlspecialchars($_POST['languageId']);
		$cityId = $city_manager->getCity($cityName)->id();
		$list_params = $user_manager->getList($user_per_page, $page, $languageId, $cityId);
		$url = 'index.php?page=home&section=userslist&cityId='.$cityId.'&languageId='.$languageId.'&pagenb=';
		$users = $list_params['list_per_page'];
		//On retire le current user de la liste des profils (qui ne sera pas afficher de toute manière).
		$nb_users = $list_params['total_found'] -1;
	}
}

else if(isset($_GET['cityId']) AND isset($_GET['languageId'])){
	if(empty($_GET['cityId']) OR empty($_GET['languageId'])){
	}
	else {
		$languageId = htmlspecialchars($_GET['languageId']);
		$cityId = htmlspecialchars($_GET['cityId']);
		$list_params = $user_manager->getList($user_per_page, $page, $languageId, $cityId);
		$url = 'index.php?page=home&section=userslist&cityId='.$cityId.'&languageId='.$languageId.'&pagenb=';
		$users = $list_params['list_per_page'];
		$nb_users = $list_params['total_found'] -1;
	}	
} else {
	$list_params = $user_manager->getList($user_per_page, $page);
	$users = $list_params['list_per_page'];
	$nb_users = $list_params['total_found'] - 1;
	$url = 'index.php?page=home&section=userslist&pagenb=';
}
