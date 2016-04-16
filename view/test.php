<?php
try {
	var_dump($country_manager);
var_dump($country_manager->getCountryName(700));
} catch (Exception $e){
	echo $e->getMessage();
}