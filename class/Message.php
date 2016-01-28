<?php

class Message 
{
	private $_id;
	private $_author_id; //id de l'utilisateur emetteur
	private $_recipient_id; // id de l'utilisateur destinataire
	private $_content;
	private $_datetime;
	private $_sent; // vaut 0 quand l'email est dans les brouillons, sinon 1
	private $_read; // vaut 0 si le message n'a pas encore été lu, sinon 1

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

	public function author_id()
	{
		return $this->_author_id;
	}

	public function recipient_id()
	{
		return $this->_recipient_id;
	}

	public function content()
	{
		return $this->_content;
	}

	public function datetime()
	{
		return $this->_datetime;
	}

	public function sent()
	{
		return $this->_sent;
	}

	public function read()
	{
		return $this->_read;
	}


	//**************** SETTERS ****************// 

	public function setId($id)
	{
		$id = (int) $id;
		$this->_id = $id;
	}

	public function setAuthor_id($author_id)
	{
			$author_id = (int) $author_id;
			$this->_author_id = $author_id;
	}

	public function setRecipient_id($recipient_id)
	{
		$recipient_id = (int) $recipient_id;
		$this->_recipient_id = $recipient_id;
	}

	public function setContent($content)
	{
		if (strlen($content) > 2000) echo 'error';
		else 
		{
			$this->_content = $content;
		}
	}

	public function setDatetime($datetime)
	{
		$this->_datetime = $datetime;
	}

	public function setSent($sent)
	{
		$sent = (bool) $sent;
		$this->_sent = $sent;
	}

	public function setRead($read)
	{
		$read = (bool) $read;
		$this->_read = $read;
	}


}