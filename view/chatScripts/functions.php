<?php
function user_verified()//retourne vrai si l'utilisateur existe
{
	return isset($_SESSION['user']);
}
?>