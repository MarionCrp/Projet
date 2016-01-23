<?php

/*******************************************
* Controleur relatif à la requête de déconnexion
********************************************/


$_SESSION = array();
unset($current_user);

session_destroy();

setcookie('email','');
setcookie('password','');

header ('Location: index.php');

?>