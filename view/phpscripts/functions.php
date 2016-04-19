<?php
function db_connect()
{

	try{
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		// INFORMATIONS DE CONNEXION
		$host = 	'localhost';
		$dbname = 	'bdtestprojettut';
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
	return isset($_SESSION['id']);
}
?>