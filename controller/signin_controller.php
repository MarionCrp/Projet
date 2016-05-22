<?php

require('PasswordHash.php'); //  cadre de hachage de mdp portable

/*******************************************
* Controleur relatif à la page de connexion
********************************************/
if (isset($current_user)){
	header('Location: index.php');
}

/**
* Si l'utilisateur a cliqué sur "connexion"
**/
if (isset($_POST['connexion'])) 
{
	/**
	* Si l'utilisateur n'a pas rempli tous les champs, affichage d'une erreur
	**/
	if (empty($_POST['email'])
	 OR empty($_POST['password'])) 
	{ 
		echo ('<p style="color:red;">' ._('Please fill in all fields'). '</p>');
	}

	/**
	* Sinon on vérifie la validité des données rentrées par l'utilisateur
	**/
	else 
	{
		$password = htmlspecialchars($_POST['password']);
		$connexion_email = htmlspecialchars($_POST['email']);

		/**
		* Si l'email appartient à un utilisateur enregistré
		**/
		if($user_manager->exists($connexion_email, 'email')) 
		{
			/**
			* On récupère les données de cet utilisateur et on les stock dans l'instance $user
			**/
			$current_user = $user_manager->getDatas($connexion_email);



			$hasher = new PasswordHash(8, true); //1er argument : base-2 logarithm of the iteration count used for password stretching
			// 2eme argument : specifies the use of portable hashes // mieux vaut TRUE pour les password


			// Just in case the hash isn't found
			$stored_hash = "*";

			// Retrieve the hash that you stored earlier
			$stored_hash = $current_user->password();



			// Check that the password is correct, returns a boolean
			$check = $hasher->CheckPassword($password, $stored_hash);


			/**
			* Si le mot de passe entré par l'utilisateur et le mot de passe de $user sont identiques
			**/
			if ($check)
			{

				/**
				* On ouvre la session utilisateur 
				* (si une session est déjà active, celle-ci est détruite pour laisser place à la nouvelle)
				**/

				$status = session_status();

				if($status == PHP_SESSION_NONE)
				{
				    //There is no active session
				    session_start();
				    $current_user;
				    $_SESSION['user'] = $current_user;
				    

				}
				elseif($status == PHP_SESSION_DISABLED)
				{
				    //Sessions are not available
				}
				elseif($status == PHP_SESSION_ACTIVE)
				{
					    //Destroy current and start new one
					    session_destroy();
					    session_start();
					    $_SESSION['user'] = $current_user;
					    
				}

				// On créé les cookies si la case "auto connect" à été cochée.
				if (!empty($_POST['auto_connect']))
				{
					setcookie('email', $connexion_email);
					setcookie('password', $connexion_password);

				}

				/**
				* Retour à la page d'accueil
				**/
				header ('Location: index.php');
			}
				
			/**
			* Si le mot de passe entré par l'utilisateur et le mot de passe de $user sont différents
			* on retourne une erreur
			**/
			else
			{
				echo ('<p style="color: red;">' ._('Wrong Password'). '</p>');
				unset($current_user);
			}
		}

		/**
		* Si l'email n'est pas présent dans la table User
		**/		
		else
		{
			echo ('<p style="color: red;">' ._('The email address you\'ve provided does not match an existing member account.'). '</p>');
			unset($current_user);
		}

	}
}

/*if(isset ($_COOKIE['email']) AND ($_COOKIE['password']))
{
	
	 //Si l'email appartient à un utilisateur enregistré
	
	if($user_manager->exists($_COOKIE['email'], 'email')) 
	{
		
		//On récupère les données de cet utilisateur et on les stock dans l'instance $user
		
		$current_user = $user_manager->getDatas($_COOKIE['email']);

		
		 Si le mot de passe entré par l'utilisateur et le mot de passe de $user sont identiques on le connecte automatique, 
		sinon on affiche un message d'erreur 

		
		if ($current_user->password() != $_COOKIE['password'])
		{
			echo '<p style="color: red;"> Mauvais mot de passe </p>';
			unset($current_user);
		}
	}
	else
	{
		header ('Location: index.php');
	}

}*/