<?php

if (isset($_POST['content']))
{
	$content = htmlspecialchars($_POST['content']);
	$current_user_id = (int) htmlspecialchars($_POST['current_user_id']);
	$recipient_id = (int) htmlspecialchars($_POST['recipient_id']);

	$to_send_message = New Message();
	$to_send_message->setContent($content);
	$to_send_message->setAuthor_id($current_user_id);
	$to_send_message->setRecipient_id($recipient_id);
	$to_send_message->setSent(true);
	$to_send_message->setRead(false);

	$message_manager->Add($to_send_message);
}