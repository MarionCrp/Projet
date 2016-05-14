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

	
	/**
	* Retourne tous les utilisateur de la table User si pas de paramètre envoyé à la fonction
	* Sinon la fonction recherche les utilisateurs parlant une langue donnée vivant dans une ville donnée
	* @return array Liste des utilisateurs
	**/
	public function getList($page = 1, $languageId = null, $cityId = null){
		$PER_PAGE = 6;
		$users = [];
		$last_element = $page * $PER_PAGE;
		$first_profile = $last_element - ($PER_PAGE - 1);
		
		if($cityId == null && $languageId == null){
			$total_users = self::count();
			$q = $this->_db->prepare('SELECT * FROM User ORDER BY id LIMIT :first, :last');
			$q->bindParam(':first', $first_profile, PDO::PARAM_INT);
			$q->bindParam(':last', $last_element, PDO::PARAM_INT);
			$q->execute();
		}
		else {
			$q = $this->_db->prepare(
			'SELECT * from 
				(SELECT * FROM USER where id in 
					(SELECT userId FROM `spoken_languages` WHERE languageId = :languageId LIMIT :first, :last )
				) speakers 
			WHERE cityId = :cityId');

			$q->execute(array(
					'languageId' => $languageId,
					'cityId' => $cityId,
					'first' => $first_profile,
					'last' => $last_element
			));

			$total_users = $this->_db->prepare('SELECT COUNT(*) from 
				(SELECT * FROM USER where id in 
					(SELECT userId FROM `spoken_languages` WHERE languageId = :languageId LIMIT :first, :last )
				) speakers 
			WHERE cityId = :cityId')->fetchColumn();

			$total_users->execute(array(
					'languageId' => $languageId,
					'cityId' => $cityId,
					'first' => $first_profile,
					'last' => $last_element
			));

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
