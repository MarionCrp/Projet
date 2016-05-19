<?php
class MessageManager extends Manager
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
	* Sauvegarde un message en base de donnée, mais ne l'envoie pas (send à 0)
	* @param $user User instance de la classe User
	**/
	public function Add(Message $message)
	{ 
		$q = $this->_db->prepare('INSERT INTO message 
			(author_id, recipient_id, content, is_sent, is_read) VALUES( :author, :recipient, :content, :sent, :read)');

		$q->execute(array(
			'author' => $message->author_id(),
			'recipient' => $message->recipient_id(),
			'content' => $message->content(),
			'sent' => $message->sent(),
			'read' => $message->is_read()
			));

		if(!$q) {
			throw new Exception('Cannot send the message');
			
		} else {
			echo ('<p style="color:green;">' ._('Message Sent').  '</p>');
		}
		// $message->hydrate([
		// 	'id' => $this->_db->lastInsertId(),
		// 	]);
	}

	/**
	* Retourne tous les messages reçu par notre utilisateur
	* @param $current_user Notre utilisateur
	* @return array Liste des messages
	**/
	public function getListOfMessages($current_user)
	{
		$messages = [];

		$q = $this->_db->prepare(
			'SELECT id, author_id, recipient_id, DATE_FORMAT(datetime, \'Le %d/%m/%Y à %Hh%i\') as datetime, content 
			FROM message 
			WHERE recipient_id = :recipient_id
				GROUP BY (author_id)
				ORDER BY datetime');

		$q->execute(array(
			'recipient_id' => $current_user->id()
			));	


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
		$q = $this->_db->prepare(
			'SELECT id, author_id, recipient_id, DATE_FORMAT(datetime, \'Le %d/%m/%Y à %Hh%i\') as datetime, content, is_read FROM Message 
			WHERE (author_id = :author_id OR author_id = :recipient_id)
			AND (recipient_id = :author_id OR recipient_id = :recipient_id)
				ORDER BY datetime');

		$q->execute(array(
			'author_id' => $author_id,
			'recipient_id' => $recipient_id
			));

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
	// public function getUnreadMessages($current_user) 
	// {
	// 	$unread_messages = [];
	// 	$current_user_id = $current_user->id();
	// 	$q = $this->_db->query(
	// 		'SELECT * 
	// 		from Message, User
	// 		where is_read = false
	// 		and message.recipient_id = user.id
	// 		and recipient_id ='.$current_user_id);

	// 	while ($datas = $q->fetch(PDO::FETCH_ASSOC))
	// 	{
	// 		$unread_messages[] = new Message($datas);
	// 	}

	// 	return $unread_messages;
	// }

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
	* Met un message non lu, a lu.
	* @param $message Message - Message dont on va changé la valeur de read de 0 à 1)
	**/
	public function setRead(Message $message) 
	{
		$q = $this->_db->prepare(
			'UPDATE Message
			SET is_read = 1 where id = :message_id');

		$q->execute(array(
			'message_id' =>  $message->id()
			));
	}

	public function stillMessagesToRead($current_user, $author_id = null){
		if($author_id){
			$q = $this->_db->prepare(
			'SELECT count(*) from Message
				WHERE recipient_id = :currentuser 
				AND author_id = :author_id
				AND is_read = 0');

		$q->execute(array(
			'currentuser' => $current_user->id(),
			'author_id' => $author_id
			));

		} else {
			$q = $this->_db->prepare(
			'SELECT count(*) from Message
				WHERE recipient_id = :currentuser
				AND is_read = 0');

			$q->execute(array(
				'currentuser' => $current_user->id()
				));
		}
		
		return $q->fetchColumn();
	}
	

}
