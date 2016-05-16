<p style="color:white;">

<?php
try {

	var_dump('Lyon', $cityId = $city_manager->getCityId('Lyon'));

	var_dump('grreferege', $cityId = $city_manager->getCityId('grreferege'));
} catch (Exception $e){
	echo $e->getMessage();
}
 		?>	</p>
