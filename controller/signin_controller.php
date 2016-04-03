<?php

/*******************************************
* Controleur relatif à la page de connexion
********************************************/


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
		$datas = array (
			$_POST['email'],
			$_POST['password']
		);

		/**
		* Sécurisation des données entrées via le formulaire
		**/
		foreach ($datas as $data)
		{
			$data = htmlspecialchars($data);
		}
		
		$connexion_email = $_POST['email'];

		/**
		* Hachage du mot de passe
		**/
		$connexion_password = sha1($_POST['password']);	

		/**
		* Si l'email appartient à un utilisateur enregistré
		**/
		if($user_manager->exists($connexion_email, 'email')) 
		{
			/**
			* On récupère les données de cet utilisateur et on les stock dans l'instance $user
			**/
			$current_user = $user_manager->getDatas($connexion_email);

			/**
			* Si le mot de passe entré par l'utilisateur et le mot de passe de $user sont identiques
			**/
			if ($current_user->password() == $connexion_password)
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
				    var_dump($current_user);
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