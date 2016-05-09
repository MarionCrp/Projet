<?php

/*
	gerer l'appel a la bdd sans cette fonction + inserrer les classes pour pouvoir recuperer les attributs dans les sessions !!!
*/
function db_connect()
{

	try{
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		// INFORMATIONS DE CONNEXION
		$host = 	'localhost';
		$dbname = 	'projet';
		$user = 	'root';
		$password = '';
		// FIN DES DONNEES
		
		$db = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $user, $password, $pdo_options);
		return $db;	
	}catch (Exception $e) {
		die('Erreur de connexion : ' . $e->getMessage());
	}
}

function user_verified()
{
	return isset($_SESSION['user']);
}
?>