<?php

/*******************************************
* AUTOLOAD, et création d'instances de travail
********************************************/

/**
* Chargement des classes
**/ 
require 'class/Autoloader.php';
Autoloader::register();

/**
* Connexion base de données
**/ 
require 'controller/db_connexion.php';

/**
* Création de différentes instances de travail
**/
require 'controller/object_manager.php';

/**
* Chargement du multilingue
**/
require 'localization.php';


/**
* Ouverture de session si l'utilisateur est connecté
*/
session_start();

if(isset($_SESSION['user']))
{	$id = $_SESSION['user']->id();
	$current_user = $user_manager->getDatas($id);
}

?>