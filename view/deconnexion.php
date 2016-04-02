<?php

/*******************************************
* Controleur relatif à la requête de déconnexion
********************************************/

$_SESSION = array();

// On supprime l'instance utilisateur connecté et on supprime la session
unset($current_user);
session_destroy();

// On met les cookies à "null"
setcookie('email','');
setcookie('password','');


// On retourne l'utilisateur déconnecté à l'index
header ('Location: index.php');

?>