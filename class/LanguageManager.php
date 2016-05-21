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
		$q = $this->_db->prepare(
			'SELECT * FROM Languages where id = :language');
		$q->execute(array(
			'language' => $language_id
			));

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
}
