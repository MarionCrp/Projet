<?php

/**
* Connexion à la base de données
**/
try
{
	$db = new PDO('mysql:host=localhost;dbname=projet', 'root', '', 
		array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));

}
catch (Exception $e)
{
	die('Erreur :'.$e->getMessage());
}

 	// try {
  //      $db = new PDO('mysql:host=iutdoua-webetu.univ-lyon1.fr;dbname=proj_aspe_bcc;charset=utf8','proj_aspe_bcc','***');
  //     }
  //     catch (Exception $e) 
  //     {
  //      echo 'Erreur: '.$e->getMessage();
  //     }
