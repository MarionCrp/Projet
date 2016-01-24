<html>

<head>
<title>envoi du mail</title>
</head>


<?php

echo '<br>';

ini_set('SMTP','smtp.sfr.fr');//on initialise le stmp pour l'envoi du mail
if (isset($_POST['pseudo']) AND ($_POST['votremail']))
{
$pseudo = $_POST['pseudo'];
$destinataire = $_POST['votremail'];
$sujet = 'mail de verification de compte';
$message = 'Bonjour '.$pseudo.', veuillez verifier votre compte en cliquant sur ce lien : http://localhost/tests/lien.php';//lien à changer.
$headers = "From: \"NOM_DU_SITE\"<bronnerloic@gmail.com>\n";
$headers .= "Reply-To: bronnerloic@gmail.com\n";
$headers .= "Content-Type: text/plain; charset=\"iso-8859-1\"";

if(mail($destinataire, $sujet, $message, $headers))
{
	echo 'Le mail a ete envoye';
}
else
{
	echo 'ERREUR';
}
}
else
{
	echo 'Veuillez remplir le formulaire en entier<br>Pour retourner au formulaire ';
	echo "<a href=\"formulaire.php\">Cliquez ici";
}
?>

</html>