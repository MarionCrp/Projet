<?php
class SpokenLanguage {
	private $_userId;
	private $_languageId;
	private $_levelId;

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

	public function userId()
	{
		return $this->_userId;
	}

	public function languageId()
	{
		return $this->_languageId;
	}

	public function levelId(){
		return $this->_levelId;
	}

	//**************** SETTERS ****************// 

	public function setUserId($userId)
	{
		$userId = (int) $userId;
		$this->_userId = $userId;
	}

	public function setLanguageId($languageId)
	{
		$languageId = (int) $languageId;
		$this->_languageId = $languageId;
	}

	public function setLevelId($levelId)
	{
		$levelId = (int) $levelId;
		$this->_levelId = $levelId;
	}

}
	