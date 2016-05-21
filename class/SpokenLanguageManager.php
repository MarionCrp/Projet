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

		if (!$q) throw new Exception(_('This language has already been added'));

		$q = $this->_db->prepare('INSERT INTO spoken_languages VALUES (:userid, :languageid, :levelid);');
		$q->execute(array(
			'userid' => $user_id,
			'languageid' => $language_id,
			'levelid' => $level_id
			));
		
		if (!$q) echo _('error adding languages to the db');
		else echo ('<p style="color:green;">' ._('A language has been added').  '</p>');
	}

	public function modifyLanguage($user_id, $language_id, $level_id){
		// On vérifie si l'entrée complète est déjà en base de données ou non
		$q = $this->_db->prepare('SELECT COUNT(*) as nb FROM spoken_languages
												  WHERE userId = :userid
												  AND languageId = :languageid
												  AND levelId = :levelid;');
		$q->execute(array(
			'userid' => $user_id,
			'languageid' => $language_id,
			'levelid' => $level_id
			));

		$data = $q->fetchColumn();

		// Si elle n'est pas en base de donnée :
		if (!$data) {

			//on vérifie si il existe tout de même une entrée avec
			// une langue donnée pour un utilisateur donné (c'est le niveau qui demanderait donc à être modifié)
			$q = $this->_db->prepare('SELECT COUNT(*) as nb FROM spoken_languages
												  WHERE userId = :userid
												  AND languageId = :languageid;');
			$q->execute(array(
				'userid' => $user_id,
				'languageid' => $language_id
				));

			$data = $q->fetchColumn();

			// Si on récupère une entrée, on modifie donc le "niveau" de langue de l'utilisateur pour cette entrée
			if($data) {
				$q = $this->_db->prepare('UPDATE spoken_languages
										  	SET levelId = :levelid
										  		WHERE userId = :userid
										  		AND languageId = :languageid;');
				$q->execute(array(
					'userid' => $user_id,
					'languageid' => $language_id,
					'levelid' => $level_id
					));

				if (!$q)  throw new Exception(_('Error editing the language level'));
				
			} else {
			// 	Sinon, on ajoute une nouvelle entrée à la base
				$this->addLanguage($user_id, $language_id, $level_id);
			}
		}
	}

	/**
	* Compare les éléments modifié aux éléments présents dans la base de donnée et supprime les données
	* qui ne sont plus présentes dans les éléments mis à jour.
	* @param Array of Languages $newlanguages
	*
	**/
	public function compareAndDeleteEditedLanguages($newLanguages){
		$oldLanguages = self::getUsersLanguages($newLanguages[0]->userId());
		$languagesToDelete = array();
		foreach ($oldLanguages as $oldLanguage){
			$isNotDeleted = false;
			foreach ($newLanguages as $newLanguage){
				if ($oldLanguage == $newLanguage){
					$isNotDeleted = true;
				}
			}
			if ($isNotDeleted == false) {
				$languagesToDelete[] = $oldLanguage;
			}
		}
		foreach ($languagesToDelete as $languageToDelete) {
			$this->deleteSpokenLanguage($languageToDelete);
		}
	}

	/**
	* Supprime un langage parlé par un utilisateur de la base de donnée 
	*
	* @param SpokenLanguage $languageToDelete
	*
	**/
	public function DeleteSpokenLanguage($languageToDelete){

		$q = $this->_db->prepare('DELETE FROM spoken_languages
												  WHERE userId = :userid
												  AND languageId = :languageid
												  AND levelId = :levelid;');
		$q->execute(array(
			'userid' => $languageToDelete->userId(),
			'languageid' => $languageToDelete->languageId(),
			'levelid' => $languageToDelete->levelId(),
			));

		if ($q) echo ('<p style="color:green;">' ._('A language has been deleted').  '</p>');
				else throw new Exception(_('Error deleting a language'));

	}

	/**
	* Récupère les langues parlées par un utilisateur donné
	* @param $userId
	*
	* @return array of SpokenLanguages $languages
	**/
	public function getUsersLanguages($userId){
		/*$level_manager = new LevelManager($this->_db);
		$language_manager = new LanguageManager($this->_db);*/
		$languages = [];
		$req = $this->_db->prepare('SELECT * FROM spoken_languages 
										WHERE userId = :user_id
											ORDER BY levelId desc' );
		$req->execute(array(
			'user_id' => $userId
			));

		while ($data = $req->fetch()) {
			// $language = $language_manager->getLanguage($data['languageId']);
			// $level = $level_manager->getLevel($data['levelId']);
			$languages[] = new SpokenLanguage(array(
				'userId' => $data['userId'],
				'languageId' => $data['languageId'],
				'levelId' => $data['levelId']));
		}

		return $languages;
	}


	/**
	* Affiche les langues parlées par un utilisateur et son niveau.
	* @param User $user
	*
	**/
	public function displayLanguages($userId){
		// On récupère les langues parlées par un utilisateur dans un array.
		$language_manager = new LanguageManager($db);
		$languages = self::getUsersLanguages($userId);
		foreach($languages as $language) {
			var_dump($language);
			$level = $language->levelId();
			 echo '<h1>'.$language_manager->getLanguage($language->languageId()).'<h1>';
			 Form::level_form($level);
		}
	}

}
