<?php
class SpokenLanguageManager extends Manager
{
	/**
	* Constructeur
	* @param $db objet PDO
	**/
	public function __construct($db)
	{
		parent::__construct($db);
	}

	public function addLanguage($user_id, $language_id, $level_id){
		$q = $this->_db->prepare('INSERT INTO spoken_languages VALUES (:userid, :languageid, :levelid);');
		$q->execute(array(
			'userid' => $user_id,
			'languageid' => $language_id,
			'levelid' => $level_id));
		if (!$q) echo _('error adding languages to the db');
	}

	/**
	* Récupère la liste des utilisateurs parlant une langue
	* @param int $language_id
	*
	* @return array of Users $array_of_users
	**/
	public function getUsers($language_id){
		$users = [];
		
		//* A finir * // 

		while ($datas = $q->fetch(PDO::FETCH_ASSOC))
		{
			$discussion[] = new Message($datas);
		}

		return $discussion;
	}

	/**
	* Récupère les langues parlées par un utilisateur donné
	* @param User $user
	*
	* @return array $languages
	**/
	public function getUsersLanguages(User $user){
		$languages = [];
		$req = $this->_db->prepare('SELECT * FROM spoken_languages WHERE userId = :user_id');
		$req->execute(array(
			'user_id' => $user->id())
		);
		while ($data = $req->fetch()) {
			$languages[] = new SpokenLanguage($donnees);
		}

		return $languages;
	}

	public function displayLevel($user_id){
		
	}

}
