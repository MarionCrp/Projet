<?php
class LanguageManager extends Manager
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
	* Récupère la langue d'une id donnée.
	* @param int $language_id
	*
	* @return Language $languages
	**/
	public function getLanguage($language_id)
	{
		$q = $this->_db->query(
			'SELECT * FROM Languages where id = '.$language_id);
		$datas = $q->fetch(PDO::FETCH_ASSOC);
		return new Language($datas);
	}


	/**
	* Récupère la liste des objets de type langue
	*
	* @return array of Language $array_of_languages
	**/
	public function getLanguages(){
		$arrayLanguages = array();
		$req = $this->_db->prepare('SELECT * FROM languages order by name');
		$req->execute();
		while ($data = $req->fetch()){
			$arrayLanguages[] = new Language([
				'id' => $data['id'],
				'name' => $data['name']
				]);
		}
		return $arrayLanguages;
	}

	/**
	* Récupère le nom attribué à l'id d'un level.
	* @param int $level_id
	*
	* @return string $level_name
	**/
	public function getLevelName($level_id){
		$req = $this->_db->prepare('SELECT name FROM language_level
									 WHERE id = :id');
		$req->execute(array(
			'id' => $level_id));

		$data = $req->fetch();

		return $data['name'];
	}


	public function displayLevel($user_id){
		
	}

}
