<?php

/*******************************************
* Controleur relatif à la page de modification de profil
********************************************/

/**
* Gestion de l'édition des attributs : name, email, gender et description
**/
if (isset($_POST['edit_general'])) {
	$posts = array('name', 'email', 'gender', 'description');

	foreach($posts as $field) {
		if (isset($_POST[$field]))
		{	
			// On sécurise les données envoyées par l'utilisateur
			$value = htmlspecialchars($_POST[$field]);
			// On gère les différentes erreurs
			if($field == "name" AND $value != $current_user->name() AND $user_manager->exists($value, $field))	echo ('<p class="fail">' ._('This name is already used'). '</p><br/>');
			elseif($field == "email" AND $value != $current_user->email() AND $user_manager->exists($value, $field))	echo ('<p class="fail">' ._('This email is already used'). '</p><br/>');
			elseif($field == "email" AND !$form->validEmail($value))	echo ('<p class="fail">' ._('the format of the e-mail is not valid'). '</p><br/>');
			elseif(empty($value)) echo ('<p class="fail">' ._('this field can\'t be empty'). '</p><br/>');
			
			// Sinon on modifie les attributs utilisateurs
			else {
				if ($value != $current_user->$field()){
					$user_id = $current_user->id();
					$user_manager->edit($user_id, $field, $value);
					$current_user = $user_manager->getDatas($user_id);
					$_SESSION['user'] = $current_user;
					echo ('<p class="success">' ._('The '.$field.' has been modified').  '</p>');
				}
			}
		}
	}
}

/**
* Gestion de la suppression de compte
**/

if (isset($_POST['delete_account']))
{
	$user_manager->delete($current_user);
	session_destroy();
	header ('Location: ./index.php');
}
