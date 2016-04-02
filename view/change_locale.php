<?php

if(isset($_GET['lang']))
{
	$lang = htmlspecialchars($_GET['lang']);
	setcookie('lang', $lang, time() + 365*24*3600, null, null, false, true);
	header ("Location: $_SERVER[HTTP_REFERER]" );
}

?>