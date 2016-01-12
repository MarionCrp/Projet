<?php

/*******************************************
* Chargement automatique des classes
********************************************/

class Autoloader
{
	/**
	* Chargement automatique des classe
	* @param $class_name string Nom des différentes classe
	**/
	static function autoload($class_name)
	{
		require 'class/'.$class_name.'.php';
	}

	/**
	* Si vous devez utiliser plusieurs fonctions d'autochargement, 
	* la fonction spl_autoload_register() est faite pour cela. 
	* Elle crée une file d'attente de fonctions d'autochargement, 
	* et les exécute les unes après les autres, dans l'ordre où elles ont été définies.
	**/
	static function register()
	{
		spl_autoload_register(array
			(__CLASS__, 'autoload'));
	}
}