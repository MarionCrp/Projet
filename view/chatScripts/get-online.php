<?php
//include_once('autoload.php');

require '../../class/user.php';
require '../../controller/db_connexion.php';

session_start();
include('functions.php');


// On vérifie que l'utilisateur est inscrit dans la base de données
$query = $db->prepare("
	SELECT *
	FROM chat_online
	WHERE online_user = :user 
");
$query->execute(array(
	'user' => $_SESSION['user']->id()
));
// On compte le nombre d'entrées
$count = $query->rowCount();
$data = $query->fetch();

	/* si l'utilisateur n'est pas inscrit dans la BDD, on l'ajoute, sinon
	on modifie la date de sa derniere actualisation */
if(user_verified())
{
	/* si l'utilisateur n'est pas inscrit dans la BDD, on l'ajoute, sinon
	on modifie la date de sa derniere actualisation */
	if($count == 0) {
		$insert = $db->prepare('
			INSERT INTO chat_online (online_id, online_ip, online_user, online_status, online_time) 
			VALUES(:id, :ip, :user, :status, :time)
		');
		$insert->execute(array(
			'id' => '',
			'ip' => $_SERVER["REMOTE_ADDR"],
			'user' => $_SESSION['user']->id(),
			'status' => '2',
			'time' => time()
		));
	} else {
		$update = $db->prepare('UPDATE chat_online SET online_time = :time WHERE online_user = :user');
		$update->execute(array(
			'time' => time(),
			'user' => $_SESSION['user']->id()
		));
	}
}

// Récupère les membres en ligne sur le chat
// et retourne une liste
$query = $db->prepare("
	SELECT id, online_id, online_user, online_status, online_time, name
	FROM chat_online 
	LEFT JOIN user ON user.id = chat_online.online_user 
	ORDER BY name
");
$query->execute();
// On compte le nombre de membres
$count = $query->rowCount();

/* Si au moins un membre est connecté, on l'affiche.
Sinon, on affiche un message indiquant que personne n'est connecté */
if($count != 0) {
	
	while ($data = $query->fetch())
	{
		if($data['online_status'] == 0)	echo '<a href="#post" onclick="insertLogin(\''.$data['name'].'\')" >'.$data['name'].'</a>'.' : absent</br>';
		else if($data['online_status'] == 1) echo '<a href="#post" onclick="insertLogin(\''.$data['name'].'\')" >'.$data['name'].'</a>'.' : Occup&eacute;</br>';
		else if($data['online_status'] == 2) echo '<a href="#post" onclick="insertLogin(\''.$data['name'].'\')" >'.$data['name'].'</a>'.' : En ligne</br>';
	}
	
}

$query->closeCursor();
?>