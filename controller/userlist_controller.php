<?php

// On stoque dans l'array $users, la liste des utilisateurs isncrits

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
		$users = $user_manager->getList($languageId, $cityId);
	}
	
} else {
	$users = $user_manager->getList();
}