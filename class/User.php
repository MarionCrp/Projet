<?php

class User 
{
	private $_id;
	private $_name;
	private $_email;
	private $_password;
	private $_gender;
	private $_description;

	/* Les attributs suivants ne sont pas encore intégrés */
	/* 
	private $_birthdate;
	private $_subscription;
	private $_status;
	private $_profession;
	*/

	/**
	* Constructeur
	* @param $data array différents attributs de l'objet
	**/
	public function __construct($datas = array())
	{
		$this->hydrate($datas);
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



	//**************** GETTERS ***************//

	public function id()
	{
		return $this->_id;
	}

	public function name()
	{
		return $this->_name;
	}

	public function email()
	{
		return $this->_email;
	}

	public function password()
	{
		return $this->_password;
	}

	public function gender()
	{
		return $this->_gender;
	}

	public function birthdate()
	{
		return $this->_birthdate;
	}

	public function description()
	{
		return $this->_description;
	}


	//**************** SETTERS ****************// 

	public function setId($id)
	{
		$id = (int) $id;
		$this->_id = $id;
	}

	public function setName($name)
	{
		if(is_string($name) && strlen($name) <= 25)
		{
			$this->_name = $name;
		}
		else echo 'error';
	}

	public function setEmail($email)
	{
		$this->_email = $email;
	}

	public function setPassword($password)
	{
		$this->_password = $password;
	}

	public function setGender($gender)
	{
		$this->_gender = $gender;
	}

	public function setBirthdate($birthdate)
	{
		$this->_birthdate = $birthdate;
	}

	public function setDescription($description)
	{
		$this->_description = $description;
	}


}