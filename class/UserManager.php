<?php
class UserManager extends Manager
{

	/**
	* Constructeur
	* @param $db objet PDO
	**/
	public function __construct($db)
	{
		parent::__construct($db);
	}

	/**
	* Ajout des utilisateurs à la base de données
	* @param $user User instance de la classe User
	**/
	public function add(User $user)
	{ 
		$q = $this->_db->prepare('INSERT INTO User 
			SET name = :name, 
				email = :email, 
				password = :password,
				gender = :gender,
				description = :description,
				nationalityId = :country,
				cityId = :city');

		$q->bindValue(':name', $user->name());
		$q->bindValue(':email', $user->email());
		$q->bindValue(':password', $user->password());
		$q->bindValue(':gender', $user->gender());
		$q->bindValue(':description', $user->description());
		$q->bindValue(':country', $user->nationalityId());
		$q->bindValue(':city', $user->cityId());

		$q->execute();

		$user->setId($this->_db->lastInsertId());

		echo _('Your account has been created');
	}

	/**
	* Compte le nombre d'utilisateur dans la base de données
	* @return int le nombre de lignes dans la table User
	**/
	public function count() 
	{
		return $this->_db->query('SELECT COUNT(*) from User')->fetchColumn();
	}


	/**
	* Méthode qui vérifie si $info est présente dans la table User .
	* Retourne 0 si $info n'est pas dans la table
	* Sinon le nombre de lignes retournées par la requête
	* @param $info string | int valeur à recherche dans la colonne
	* @param $champ string nom de la colonne
	* @return int
	**/
	public function exists($info, $field)
	{
		$q = $this->_db->prepare('SELECT count(*) from user where '.$field.' = :info');
		$q->execute(array(
				'info' => $info
				));	

		$count = $q->fetchColumn();
		return($count);
	}

	/**
	* Créer une instance User à partir de données présente dans la table User
	* @param $data string | int
	* @return User
	**/
	public function getDatas($data)
	{
		$valid = new Form();

		if ($valid->validEmail($data))
		{
			$q = $this->_db->query(
			'SELECT * FROM User
			WHERE email = "'.$data.'"') or die(print_r($q->errorInfo()));
		}

		elseif (is_string($data))
		{
			$q = $this->_db->query(
			'SELECT * FROM User
			WHERE name = "'.$data.'"') or die(print_r($q->errorInfo()));
		}

		else
		{
			$data = (int) $data;
			$q = $this->_db->query(
				'SELECT * from User
				WHERE id = '.$data);
		}

		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		return new User($donnees);
	}



	public function getPassword($email){
			$q = $this->_db->prepare('SELECT password FROM user WHERE email=?');
			$password=$q->execute(array($email));
			//var_dump($password=$q->execute(array($email)));
			return $password;
	}	

//$query = $db->prepare('SELECT password FROM `user` WHERE email=?'); // requête SQL
			//$query->execute(array($_POST['email'])); // paramètres et exécution







	/**
	* Retourne tous les utilisateur de la table User si pas de paramètre envoyé à la fonction
	* Sinon la fonction recherche les utilisateurs parlant une langue donnée vivant dans une ville donnée
	* @return array Liste des utilisateurs
	**/
	public function getList($current_user_id, $per_page, $page = 1, $languageId = null, $cityId = null){
		$languageId = (int) $languageId;
		$cityId = (int) $cityId;

		$users = [];
		$first_profile = ($page-1) * $per_page ;
		
		if($cityId == null && $languageId == null){
			$total_users = self::count() - 1;
			$q = $this->_db->prepare('SELECT * FROM User 
										WHERE id != :current_user_id 
											ORDER BY id LIMIT :first, :per_page');
			$q->bindParam('current_user_id', $current_user_id, PDO::PARAM_INT);
			$q->bindParam('first', $first_profile, PDO::PARAM_INT);
			$q->bindParam('per_page', $per_page, PDO::PARAM_INT);
			$q->execute();
		}
		else {

			$count = $this->_db->prepare('SELECT count(*) FROM 
											(SELECT * FROM USER 
												WHERE id IN 
													(SELECT userId FROM `spoken_languages` 
														WHERE id != :current_user_id
															AND	languageId = :languageId)
												AND cityId = :cityId) speaker');

			$count->execute(array(
					'languageId' => $languageId,
					'cityId' => $cityId,
					'current_user_id' => $current_user_id
			));

			$total_users = $count->fetchColumn();

			$q = $this->_db->prepare('SELECT * FROM USER 
					WHERE id IN 
						(SELECT userId FROM `spoken_languages` 
							WHERE id != :current_user_id
							AND languageId = :languageId)
					AND cityId = :cityId LIMIT :first, :per_page');

			$q->bindParam('current_user_id', $current_user_id, PDO::PARAM_INT);
			$q->bindParam('languageId', $languageId, PDO::PARAM_INT);
			$q->bindParam('cityId', $cityId, PDO::PARAM_INT);
			$q->bindParam('first', $first_profile, PDO::PARAM_INT);
			$q->bindParam('per_page', $per_page, PDO::PARAM_INT);
			$q->execute();

		}

		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$users[] = new User($donnees);
		}

		return array(
			'list_per_page' => $users,
			'total_found' => $total_users
			);
	}

	/**
	* Supprime un utilisateur de la base de données
	* @param $user User utilisateur à supprimer
	**/
	public function delete(User $user)
	{
		$this->_db->exec(
			'DELETE FROM User WHERE id = '.$user->id());

	}

	/**
	* Sinon on vérifie la validité des données rentrées par l'utilisateur
	* @param $id int L'identifiant de l'utilisateur qui doit être modifié
	* @param $field string le champ à modifier
	* @param $value string | int la nouvelle valeur
	* 
	**/
	public function edit($id, $field, $value)
	{ 
		$q = $this->_db->prepare('UPDATE User 
			SET '.$field.' = "'. $value .'" where id = '.$id);
		$q->execute();
	}
}
