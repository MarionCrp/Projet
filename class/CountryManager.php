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

	/**
	* Affiche la liste de tous les pays
	*
	* @param int $country_id
	*
	* @return string $countryName
	*/
	public function getCountryName($country_id){
		$req = $this->_db->prepare('SELECT name FROM countries where id = :id ');
		$req->execute(array(
			'id' => $country_id));
		$data = $req->fetch();
			$country_name = $data['name'];
			if ($country_name == null) throw new Exception('No country with the id ' .$country_id);
			else return $country_name;
	}

}