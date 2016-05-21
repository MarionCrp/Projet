<?php
require '../../controller/db_connexion.php';
session_start();
include('functions.php');



$query = $db->prepare("
	SELECT *
	FROM chat_messages
	WHERE message_time < :time - 86400
");
$query->execute(array(
	'time' => time()
));

$count = $query->rowCount();

if($count != 0)//si il y a des messages plus vieux, on les supprimes
{
	$query = $db->prepare("
		DELETE
		FROM chat_messages
		WHERE message_time < :time - 86400
	");
	$query->execute(array(
		'time' => time()
	));
}


$query = $db->prepare("
	SELECT message_text, message_time, name
	FROM chat_messages JOIN user ON user.id = chat_messages.message_user AND message_time > :time - 86400 ORDER BY message_time DESC limit 0,50
");
$query->execute(array(//on recupère les messages (pas trop vieux) meme si supprimes les anciens avant
	'time' => time()
));

while ($data = $query->fetch())//on envoie les messages via ajax
{
	echo $data['name'].' '.date('[H:i]', $data['message_time']).' : '.$data['message_text'].'</br>';
}	
?>