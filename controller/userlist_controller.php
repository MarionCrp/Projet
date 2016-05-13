<?php

// On stoque dans l'array $users, la liste des utilisateurs isncrits
$users = $user_manager->getList();

function getGenderIcon($user){
	if($user->gender() == 'male'){
		return 'male';
	} else {
		return 'female';
	}
}