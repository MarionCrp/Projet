<?php
class CountryManager extends Manager {
	/**
	* Constructeur
	* @param $data array différents attributs de l'objet
	**/
	public function __construct($db)
	{
		parent::__construct($db);
	}	

	/**
	* Affiche la liste de tous les pays
	*
	* @return array $arrayCountries
	*/
	public function getCountries(){
		$arrayCountries = array();
		$req = $this->_db->prepare('SELECT * FROM countries order by name');
		$req->execute();
		while ($data = $req->fetch()){
			$arrayCountries[] = new Country([
				'id' => $data['id'],
				'name' => $data['name']
				]);
		}

		return $arrayCountries;
	}
}