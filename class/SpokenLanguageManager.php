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
		$q = $this->_db->prepare('SELECT COUNT(*) FROM spoken_languages
												  WHERE userId = :userid,
												  AND languageId = :languageid;');
		$q->execute(array(
			'userid' => $user_id,
			'languageid' => $language_id
			));

		if (!$q) throw new Exception('Cette langue a déjà été ajoutée dans vos contacts');

		$q = $this->_db->prepare('INSERT INTO spoken_languages VALUES (:userid, :languageid, :levelid);');
		$q->execute(array(
			'userid' => $user_id,
			'languageid' => $language_id,
			'levelid' => $level_id
			));
		
		if (!$q) echo _('error adding languages to the db');
	}

	// public function modifyLanguage($user_id, $language_id, $level_id){
	// 	$q = $this->_db->prepare('SELECT COUNT(*) FROM spoken_languages
	// 											  WHERE userId = :userid,
	// 											  AND languageId = :languageid,
	// 											  AND ;');
	// 	$q->execute(array(
	// 		'userid' => $user_id,
	// 		'languageid' => $language_id
	// 		));

	// 	if (!$q) throw new Exception('Cette langue a déjà été ajoutée dans vos contacts');

	// 	$q = $this->_db->prepare('INSERT INTO spoken_languages VALUES (:userid, :languageid, :levelid);');
	// 	$q->execute(array(
	// 		'userid' => $user_id,
	// 		'languageid' => $language_id,
	// 		'levelid' => $level_id
	// 		));
		
	// 	if (!$q) echo _('error adding languages to the db');
	// }

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
	* @return array of SpokenLanguages $languages
	**/
	public function getUsersLanguages(User $user){
		$level_manager = new LevelManager($this->_db);
		$language_manager = new LanguageManager($this->_db);
		$languages = [];
		$req = $this->_db->prepare('SELECT * FROM spoken_languages WHERE userId = :user_id');
		$req->execute(array(
			'user_id' => $user->id())
		);
		while ($data = $req->fetch()) {
			$language = $language_manager->getLanguage($data['languageId']);
			$level = $level_manager->getLevel($data['levelId']);
			$languages[] = new SpokenLanguage(array(
				'user' => $user,
				'language' => $language,
				'level' => $level));
		}

		return $languages;
	}


	/**
	* Affiche les langues parlées par un utilisateur et son niveau.
	* @param User $user
	*
	**/
	public function displayLanguages(User $user){
		// On récupère les langues parlées par un utilisateur dans un array.
		$languages = self::getUsersLanguages($user);
		foreach($languages as $language) {
			var_dump($language);
			$level = $language->level();
			 echo '<h1>'.$language->name().'<h1>';
			 Form::level_form($level);
		}
	}

}
