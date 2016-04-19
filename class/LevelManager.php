<?php
class LevelManager extends Manager
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
	* Récupère les données d'un niveau.
	* @param int $language_id
	*
	* @return Level $level
	**/
	public function getLevel($level_id)
	{
		$q = $this->_db->prepare(
			'SELECT * FROM language_level where id = :id');
		$q->execute(array(
			'id' => $level_id));

		$datas = $q->fetch();
		return new Level($datas);
	}
}