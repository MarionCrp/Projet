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

		/**
	* Récupère le nom attribué à l'id d'un level.
	* @param int $level_id
	*
	* @return string $level_name
	**/
	public function getLevelName($level_id){
		$req = $this->_db->prepare('SELECT name FROM language_level
									 WHERE id = :id');
		$req->execute(array(
			'id' => $level_id));

		$data = $req->fetch();

		return $data['name'];
	}
}