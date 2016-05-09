<?php

require '../../class/user.php';

session_start();
include('functions.php');
$db = db_connect();



if(user_verified()) {
	if(isset($_POST['message']) AND !empty($_POST['message'])) {	
		/* On teste si le message ne contient qu'un ou plusieurs points et
		qu'un ou plusieurs espaces, ou s'il est vide. 
			^ -> début de la chaine - $ -> fin de la chaine
			[-. ] -> espace, rien ou point 
			+ -> une ou plusieurs fois
		Si c'est le cas, alors on envoie pas le message */
			$query = $db->prepare("SELECT * FROM chat_messages WHERE message_user = :user ORDER BY message_time DESC LIMIT 0,1");
			$query->execute(array(
				'user' => $_SESSION['user']->id()
			));
			$count = $query->rowCount();
			$data = $query->fetch();
			// Vérification de la similitude
			if($count != 0)
				similar_text($data['message_text'], $_POST['message'], $percent);
			

					// YES ! ON PEUT CONTINUER ! Ouiiiii.
					$insert = $db->prepare('
						INSERT INTO chat_messages (message_id, message_user, message_time, message_text) 
						VALUES(:id, :user, :time, :text)
					');
					$insert->execute(array(
						'id' => '',
						'user' => $_SESSION['user']->id(),
						'time' => time(),
						'text' => $_POST['message']
					));
					echo true;
					
	} else
		echo 'Votre message est vide.';	
} else
	echo 'Vous devez être connecté.';	
?>