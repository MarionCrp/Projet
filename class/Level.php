<?php
class Level {
	private $_id;
	private $_name;


	/**
	* Constructeur
	* @param $data array différents attributs de l'objet
	**/
	public function __construct($datas = array())
	{
		$this->hydrate($datas);
	}

	/**
	* Fonction d'hydratation de l'objet Level par l'appel des setters associés
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

	//**************** GETTERS ***************//

	public function id()
	{
		return $this->_id;
	}

	public function name()
	{
		return $this->_name;
	}

	//**************** SETTERS ****************// 

	public function setId($id)
	{
		$id = (int) $id;
		$this->_id = $id;
	}

	public function setName($name)
	{
		if(is_string($name) && strlen($name) <= 255)
		{
			$this->_name = $name;
		}
		else echo 'error';
	}
}