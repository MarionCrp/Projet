<?php

/* TRAITEMENT DU MESSAGE A ENVOYE (si il possède bien un contenu) */
if(isset($_POST['envoie'])){
	if (!empty($_POST['content']))
	{
		$content = htmlspecialchars($_POST['content']);
		$current_user_id = (int) htmlspecialchars($_POST['current_user_id']);
		$recipient_id = (int) htmlspecialchars($_POST['recipient_id']);

		$to_send_message = New Message(array(
			'author_id' => $current_user_id,
			'recipient_id' => $recipient_id,
			'sent' => 1,
			'is_read' => 0,
			'content' => $content
			));

		try {
		$message_manager->Add($to_send_message);
		} catch (Exception $e){
			echo $e->getMessage();
		}
	}
}