<?php
class CityManager extends Manager {
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
	* @param int $country_id
	*
	* @return string $countryName
	*/
	public function getCity($city_id){
		$req = $this->_db->prepare('SELECT * FROM cities where id = :id ');
		$req->execute(array(
			'id' => $city_id));
		$donnees = $req->fetch(PDO::FETCH_ASSOC);
		if ($donnees == false) throw new Exception('No country with the id ' .$city_id);
		else return new City($donnees);
	}

	/**
	* Retourne la Région de l'id d'une ville.
	*
	* @param int $city_id
	*
	* @return State $state
	*/
	public function getState($city_id){
		$req = $this->_db->prepare('SELECT * FROM states WHERE id = (SELECT stateId FROM cities where id = :id)');
		$req->execute(array(
			'id' => $city_id));
		$donnees = $req->fetch(PDO::FETCH_ASSOC);
		if ($donnees == false) throw new Exception('No city with the id ' .$city_id);
		else return new State($donnees);
	}

	/**
	* Retourne la Région de l'id d'une ville.
	*
	* @param int $city_id
	*
	* @return State $state
	*/
	public function getCountry($city_id){
		$state = self::getState($city_id);
		$req = $this->_db->prepare('SELECT * FROM countries WHERE id = (SELECT countryId FROM states where id = :id)');
		$req->execute(array(
			'id' => $state->id()));
		$donnees = $req->fetch(PDO::FETCH_ASSOC);
		if ($donnees == false) throw new Exception('No Country Found');
		else return new Country($donnees);
	}
	
	/**
	* Affiche le nom d'une ville
	*
	* @param int $country_id
	*
	* @return string $countryName
	*/
	public function getCityName($city_id){
		return self::getCity($city_id)->name();
	}


}