<?php  

/*******************************************
* Controleur relatif à la page d'inscription
********************************************/

if (isset($current_user)){
	header('Location: index.php');
}

/**
* Si l'utilisateur a cliqué sur "connexion"
**/
if (isset($_POST['create_account'])) 
{
	/**
	* Si l'utilisateur n'a pas rempli tous les champs, affichage d'une erreur
	**/
	if (empty($_POST['name']) 
	 OR empty($_POST['email']) 
	 OR empty($_POST['create_account']) 
	 OR empty($_POST['password']) 
	 OR empty($_POST['confirmed_pw'])
	 OR empty($_POST['gender'])
	 OR empty($_POST['nationality'])
	 OR empty($_POST['city'])) 
	{
	$error = ('<p class="fail">' ._('Please fill in all fields'). '</p>');
	}

	/**
	* Si tous les champs ont été remplis
	**/
	else 
	{
		$datas = array (
		$_POST['name'],
		$_POST['email'],
		$_POST['password'],
		$_POST['confirmed_pw'],
		$_POST['gender'],
		$_POST['description'],
		$_POST['nationality'],
		$_POST['city']
		);

		/**
		* Sécurisation des données entrées via le formulaire
		**/
		foreach ($datas as $data)
		{
			$data = htmlspecialchars($data);
		}

		/**
		* Hachage des mots de passe
		**/
		$password = sha1($_POST['password']);
		$confirmed_pw = sha1($_POST['confirmed_pw']);

		/**
		* Si les mots de passe sont identiques
		**/
		if ($form->validPassword($password, $confirmed_pw))
		{
			/*Instanciation d'un utilisateur*/
			$current_user = new User(array(
				'name' => $_POST['name'],
				'email' => $_POST['email'],
				'password' => $password,
				'gender' => $_POST['gender'],
				'description' => $_POST['description'],
				'nationalityId' => $_POST['nationality'],
				'cityId' => $_POST['city']
			));	

			/**
			* Vérification du format de l'email
			* Si l'email n'est pas valide, message d'erreur et on supprime l'instance $user
			**/
			if(!$form->validEmail($current_user->email()))
			{
				echo ('<p class="fail">' ._('Please enter a valid e-mail adress'). '</p>');
				unset($current_user);
			}

			/**
			* Vérification que les données (nom et email) ne soient pas déjà existantes dans la table User
			**/
			else if ($user_manager->exists($current_user->name(), 'name') != 0)
			{
				echo ('<p class="fail"> "'.$current_user->name(). ' ' ._('is already taken'). '</p>');
				unset($current_user);
			}

			else if ($user_manager->exists($current_user->email(), 'email') != 0)
			{
				echo ('<p class="fail"> "'.$current_user->email(). ' ' ._('is already taken'). '.</p>');
				unset($current_user);
			}

			/**
			* Si le format de l'email est valide et que les nom et email ne sont pas déjà utilisés par un autre utilisateur
			* on ajoute ce nouvel utilisateur à la base de donnée
			* on enregistre les langues éventuelles qu'il aurait renseigné.
			* on ouvre une session et on envoie l'utilisateur sur la page d'accueil
			**/
			else 
			{
				
				$user_manager->add($current_user);

				foreach (array_combine($_POST['languages_id'], $_POST['levels_id']) as $languageid => $levelid) {
			    	$spoken_language_manager->addLanguage($current_user->id(), $languageid, $levelid);
				}
				
				$_SESSION['user'] = $current_user;
				header ('Location: index.php');
			}
		}
	}
}

