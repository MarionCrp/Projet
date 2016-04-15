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
	public function getCityName($city_id){
		$req = $this->_db->prepare('SELECT name FROM cities where id = :id ');
		$req->execute(array(
			'id' => $city_id));
		$data = $req->fetch();
			$city_name = $data['name'];
			if ($city_name == null) throw new Exception('No country with the id ' .$city_id);
			else return $city_name;
	}
}