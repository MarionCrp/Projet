<?php
class MessageManager 
{
	private $_db;

	/**
	* Constructeur
	* @param $db objet PDO
	**/
	public function __construct($db)
	{
		$this->setDb($db);
	}

	/**
	* 
	* @param $db objet PDO
	**/
	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}

	/**
	* Sauvegarde un message en base de donnée, mais ne l'envoie pas (send à 0)
	* @param $user User instance de la classe User
	**/
	public function Add(Message $message)
	{ 
		$q = $this->_db->prepare('INSERT INTO Message 
			SET author_id = :author, 
				recipient_id = :recipient,
				content = :content, 
				sent = :sent'
				);

		$q->bindValue(':author', $message->author_id());
		$q->bindValue(':recipient', $message->recipient_id());
		$q->bindValue(':content', $message->content());
		$q->bindValue(':sent', $message->sent());

		$q->execute();

		$message->hydrate([
			'id' => $this->_db->lastInsertId(),
			]);
	}



	/**
	* Retourne tous les messages reçu par notre utilisateur
	* @param $current_user Notre utilisateur
	* @return array Liste des messages
	**/
	public function getListOfMessages($current_user)
	{
		$current_user_id = $current_user->id();
		$messages = [];
		/*$q = $this->_db->query(
			'SELECT * FROM Message User where recipient_id = '.$current_user_id.' 
			 ORDER BY datetime');*/

		$q = $this-> _db->query(
			'SELECT id, author_id, recipient_id, DATE_FORMAT(max(datetime), \'Le %d/%m/%Y à %Hh%i\') as datetime, sent, content 
			FROM message 
			WHERE recipient_id = '.$current_user_id.' 
			GROUP BY (author_id)
			ORDER BY datetime');

		while ($datas = $q->fetch(PDO::FETCH_ASSOC))
		{
			$messages[] = new Message($datas);
		}

		return $messages;
	}

	/**
	* Retourne un message
	* @param $message_id l'identifiant du message
	* @return array le message stoqué dans une instance message
	**/
	public function getMessage($message_id)
	{
		$q = $this->_db->query(
			'SELECT * FROM Message where id = '.$message_id);
		$datas = $q->fetch(PDO::FETCH_ASSOC);
		return new Message($datas);
	}

	/**
	* Retourne la liste de message d'une discussion
	* @param $author_id l'identifiant de l'envoyeur
	* @param $recipient_id l'identifiant du destinataire
	* @return array le message stoqué dans une instance message
	**/
	public function getDiscussion($author_id, $recipient_id)
	{
		$discussion = [];
		$q = $this->_db->query(
			'SELECT id, author_id, recipient_id, DATE_FORMAT(datetime, \'Le %d/%m/%Y à %Hh%i\') as datetime, sent, content FROM Message 
			where author_id in ('.$author_id.', '.$recipient_id.')
			and recipient_id in ('.$author_id.', '.$recipient_id.') 
			order by datetime asc');

		while ($datas = $q->fetch(PDO::FETCH_ASSOC))
		{
			$discussion[] = new Message($datas);
		}

		return $discussion;
	}

	/**
	* Compte le nombre de messages non lus de notre utilisateur
	* @param $current_user Notre utilisateur
	* @return int le nombre de messages non lus
	**/
	public function countUnreadMessages($current_user) 
	{
		$current_user_id = $current_user->id();
		return $this->_db->query('SELECT COUNT(*) from Message, User 
			where message.recipient_id = user.id 
			and recipient_id = '.$current_user_id)->fetchColumn();
	}

	/**
	* Retourne les messages non lus. 
	* @param $current_user Notre utilisateur
	* @return array les messages non lus par l'utilisateur
	**/
	public function getUnreadMessages($current_user) 
	{
		$unread_messages = [];
		$current_user_id = $current_user->id();
		$q = $this->_db->query(
			'SELECT * 
			from Message, User
			where read = false
			and message.recipient_id = user.id
			and recipient_id ='.$current_user_id);

		while ($datas = $q->fetch(PDO::FETCH_ASSOC))
		{
			$unread_messages[] = new Message($datas);
		}

		return $unread_messages;
	}

	/**
	* Récupère le nom de l'auteur d'un message suivant son id utilisateur
	* @param $message Message - Message dont on récupère l'auteur (attribut "author_id")
	**/

	public function getAuthor(Message $message) 
	{
		$message_id = $message->id();
		$q = $this->_db->query(
			'SELECT name FROM User, Message
			WHERE user.id = message.author_id 
			and message.id = '.$message_id) or die(print_r($q->errorInfo()));
		return ($q->fetchColumn());
	}




	/**
	* Supprime un utilisateur de la base de données
	* @param $user User utilisateur à supprimer
	**/
	public function delete(User $user)
	{
		$this->_db->exec(
			'DELETE FROM User WHERE id = '.$user->id());
	}

	/**
	* Sinon on vérifie la validité des données rentrées par l'utilisateur
	* @param $id int L'identifiant de l'utilisateur qui doit être modifié
	* @param $field string le champ à modifier
	* @param $value string | int la nouvelle valeur
	* 
	**/
	public function edit($id, $field, $value)
	{ 
		$q = $this->_db->prepare('UPDATE User 
			SET '.$field.' = "'. $value .'" where id = '.$id);

		$q->execute();
	}
}
