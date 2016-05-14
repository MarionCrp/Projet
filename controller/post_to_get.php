<?php
if(isset($_POST['search_user'])){
	if(empty($_POST['cityName']) OR empty($_POST['languageId'])){
		throw new Exception('Please fill in all the fields');
	}
	else {
		$cityName = htmlspecialchars($_POST['cityName']);
		$languageId = htmlspecialchars($_POST['languageId']);

		$cityId = $city_manager->getCity($cityName)->id();
	}
}

header('Location: index.php?cityId='.$cityId.'&languageId='.$languageId);