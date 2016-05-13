<?php

var_dump($user_id = ($_GET['id']));

if($user_manager->exists($user_id, 'id')){
	$user_found = true;
	$user = $user_manager->getDatas($user_id);
	$title = _($user->name().'s Profile');
} else {
	$user_found = false;
	$title = 'No profil found';
	
}