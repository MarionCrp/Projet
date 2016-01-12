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
* Création de l'instance $message pour gérer les données du formulaire
**/
$message_manager = new MessageManager($db);