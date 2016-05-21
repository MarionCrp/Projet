<?php

require('PasswordHash.php'); //  cadre de hachage de mdp portable

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
		echo ('<p style="color:red;">' ._('Please fill out the 3 fields to modify your password'). '<p><br/>');
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


		$current_user = $user_manager->getDatas($datas);
		$user_email = $current_user->email();

		$hasher = new PasswordHash(8, true); //1er argument : base-2 logarithm of the iteration count used for password stretching
											// 2eme argument : specifies the use of portable hashes // mieux vaut TRUE pour les password

		$current_password = htmlspecialchars($_POST['current_password']);
		$new_password = htmlspecialchars($_POST['new_password']);
		$confirmed_pw = htmlspecialchars($_POST['confirmed_pw']);

		// Just in case the hash isn't found
			$stored_hash = "*";

		// Retrieve the hash that you stored earlier
		$stored_hash = $user_manager->getPassword($user_email);



		// Check that the password is correct, returns a boolean
		$check = $hasher->CheckPassword($current_password, $stored_hash);

		//$_POST['new_password'] = sha1($_POST['new_password']);
		//$_POST['confirmed_pw'] = sha1($_POST['confirmed_pw']);

		//Gestion des différentes erreurs
		if (!$check){
			echo '<p style="color:red;">' ._('The current password is wrong'). '</p>';
			$_POST['current_password'];
			$current_user->password();
		}
		elseif ($new_password != $confirmed_pw) 
		{
			echo  '<p style="color:red;">' ._('The two new passwords are different'). '</p>';
		}
		
		// Mise à jour du mot de passe si aucune erreur n'est relevées.
		else
		{
			//C'EST ICI QU'ON HASH LE MOT DE PASSE
			$hash = $hasher->HashPassword($new_password); //fonction HashPassword incluse dans PasswordHash.php

			$user_id = $current_user->id();
			$user_manager->edit($user_id, "password", $hash);
			$current_user = $user_manager->getDatas($user_id);
			$_SESSION['user'] = $current_user;
			echo ('<p style="color:green;">' ._('The password has been modified'). '</p>');
		}
	}
}