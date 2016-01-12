<?php

/*******************************************
* Controleur relatif à la page de modification de profil
********************************************/


/**
* Gestion de l'édition des attributs : name, email, gender et description
**/
$posts = array('name', 'email', 'gender', 'description');

foreach($posts as $field) {
	if (isset($_POST[$field]))
	{	
		// On sécurise les données envoyées par l'utilisateur
		$value = htmlspecialchars($_POST[$field]);
		// On gère les différentes erreurs
		if($field == "name" AND $user_manager->exists($value, $field))	echo 'Ce nom est déjà utilisé<br/>';
		elseif($field == "email" AND $user_manager->exists($value, $field))	echo 'Cet email est déjà utilisé<br/>';
		elseif($field == "email" AND !$form->validEmail($value))	echo 'Ce format d\'email n\'est pas valide<br/>';
		elseif(empty($value)) echo 'Le champ ne peut pas être vide<br/>';
		// Sinon on modifie les attributs utilisateurs
		else {
			$user_id = $current_user->id();
			$user_manager->edit($user_id, $field, $value);
			session_destroy();
			session_start();
			$current_user = $user_manager->getDatas($user_id);
			$_SESSION['user'] = $current_user;
			echo '<p style="color:green;"> Le profil a bien été modifié </p>';
		}
	}
}

/**
* Gestion de l'édition de mot de passe
**/
if (isset($_POST['edit_password']))
{
	// On vérifie que les trois champs relatifs au mot de passe ont bien été saisi
	if(empty($_POST['current_password'])
	OR empty($_POST['new_password'])
	OR empty($_POST['confirmed_pw']))
	{
		echo 'Veuillez remplir les trois champs pour modifier le mot de passe<br/>';
	}
	else
	{

		$datas = array (
			$_POST['current_password'],
			$_POST['new_password'],
			$_POST['confirmed_pw']
			);

		// On sécurise les données mdp entrée par l'utilisateur, et on les hache. 
		foreach ($datas as $data)
		{
			$data = htmlspecialchars($data);
		}

		$_POST['current_password'] = sha1($_POST['current_password']);
		$_POST['new_password'] = sha1($_POST['new_password']);
		$_POST['confirmed_pw'] = sha1($_POST['confirmed_pw']);

		//Gestion des différentes erreurs
		if ( $_POST['current_password'] != $current_user->password())
		{
			echo 'Le mot de passe actuel est faux';
			$_POST['current_password'];
			$current_user->password();
		}
		
		elseif ($_POST['new_password'] != $_POST['confirmed_pw']) 
		{
			echo 'Les deux nouveaux mots de passe ne sont pas identiques';
		}
		
		// Mise à jour du mot de passe si aucune erreur n'est relevées.
		else
		{
			$user_id = $current_user->id();
			$user_manager->edit($user_id, "password", $_POST['new_password']);
			session_destroy();
			session_start();
			$current_user = $user_manager->getDatas($user_id);
			$_SESSION['user'] = $current_user;
			echo '<p style="color:green;"> Le mot de passe a bien été modifié </p>';
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

