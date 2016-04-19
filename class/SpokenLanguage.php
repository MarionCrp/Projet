<?php
class SpokenLanguage {
	private $_user;
	private $_language;
	private $_level;

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

	public function user()
	{
		return $this->_user;
	}

	public function language()
	{
		return $this->_language;
	}

	public function level(){
		return $this->_level;
	}

	//**************** SETTERS ****************// 

	public function setUser(User $user)
	{
		$this->_user = $user;
	}

	public function setLanguage($language)
	{
		$this->_language = $language;
	}

	public function setLevel($level)
	{
		$this->_level = $level;
	}

}
	