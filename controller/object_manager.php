<?php 

/**
* Création de l'instance $user_manager pour gérer les instances de User
**/
$user_manager = new UserManager($db);

/**
* Création de l'instance $form pour gérer les données du formulaire
**/
$form = new Form();

/**
* Création de l'instance $message_manager pour gérer les données du formulaire
**/
$message_manager = new MessageManager($db);

/**
* Création de l'instance $country_manager pour gérer les données du formulaire
**/
$country_manager = new CountryManager($db);

/**
* Création de l'instance $city_manager pour gérer les données du formulaire
**/
$city_manager = new CityManager($db);

/**
* Création de l'instance $language_manager pour gérer les données du formulaire
**/
$language_manager = new LanguageManager($db);

/**
* Création de l'instance $spoken_language_manager pour gérer les données du formulaire
**/
$spoken_language_manager = new SpokenLanguageManager($db);