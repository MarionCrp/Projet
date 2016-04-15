<?php

abstract class Manager {
	
	protected $_db;

	/**
	* Constructeur
	* @param $db objet PDO
	**/
	public function __construct($db)
	{
		$this->setDb($db);
	}

	/**
	* Fonction d'hydratation de l'objet User par l'appel des setters associés
	* @param $datas array différents attributs de l'objet
	**/
	public function hydrate(array $datas)
	{
		foreach ($datas as $key => $value)
		{
			$method = 'set'.ucfirst($key);

			if(method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}

	/**
	* 
	* @param $db objet PDO
	**/
	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
}