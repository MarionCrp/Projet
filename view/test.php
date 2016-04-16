<?php
try {
var_dump($city_manager->getCountry(17801));
} catch (Exception $e){
	echo $e->getMessage();
}