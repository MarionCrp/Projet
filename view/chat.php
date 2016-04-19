<!doctype html>
<html>
<?php
//session_start();
include('phpscripts/functions.php');
$db = db_connect();
?>

		<head>
		
		    <meta charset="utf-8" />		
			<link rel="stylesheet" type="text/css" href="stylechat.css">
			<script
			  src="http://code.jquery.com/jquery-2.2.3.js"
			  integrity="sha256-laXWtGydpwqJ8JA+X9x2miwmaiKhn8tVmOVEigRNtP4="
			  crossorigin="anonymous">
			</script>
			<script type="text/javascript">


   
/**function insertLogin(login)**/

function insertLogin(login) {
	var $message = $("#message");
	$message.val($message.val() + login + ' >>> ').focus();
}

/**variables de gestion de temps**/
var reloadTime = 1000;
var scrollBar = false;

/**function getMessages()**/

function getMessages() {
	
	// On lance la requête ajax
	$.getJSON('phpscripts/get-message.php', function(data) {
			/* 
			-------------------$.getJSON('phpscripts/get-message.php?dateConnexion='+$("#dateConnexion").val(), function(data) {
			On vérifie que error vaut 0, ce
			qui signifie qu'il n'y aucune erreur */
			
			
			if(data['error'] == '0') {
				// On intialise les variables pour le scroll jusqu'en bas
				// Pour voir les derniers messages
				var container = $('#text');
  				var content = $('#messages_content');
				var height = content.height()-500;
				var toBottom;

				// Si avant l'affichage des messages, on se trouve en bas, 
				// alors on met toBottom a true afin de rester en bas				
				// Il faut tester avant affichage car après, le message a déjà été
				// affiché et c'est pas facile de se remettre en bas :D
				if(container[0].scrollTop == height)
					toBottom = true;
				else
					toBottom = false;


				$("#annonce").html('<span class="info"><b>'+data['annonce']+'</b></span><br /><br />');
				$("#text").html(data['messages']);

				// On met à jour les variables de scroll
				// Après avoir affiché les messages
  				content = $('#messages_content');
				height = content.height()-500;
				
				// Si toBottom vaut true, alors on reste en bas
				if(toBottom == true)
					container[0].scrollTop = content.height();	
  
  				// Lors de la première actualisation, on descend
   				if(scrollBar != true) {
					container[0].scrollTop = content.height();
					scrollBar = true;
				}	
			} else if(data['error'] == 'unlog') {
				/* Si error vaut unlog, alors l'utilisateur connecté n'a pas
				de compte. Il faut le rediriger vers la page de connexion */
				$("#annonce").html('');
				$("#text").html('');
				$(location).attr('href',"chat.php");
			}
	});
}

/**function postMessage()**/

function postMessage() {
	// On lance la requête ajax
	// type: POST > nous envoyons le message

	// On encode le message pour faire passer les caractères spéciaux comme +
	var message = encodeURIComponent($("#message").val());
	$.ajax({
		type: "POST",
		url: "phpscripts/post-message.php",
		data: "message="+message,
		success: function(msg){
			// Si la réponse est true, tout s'est bien passé,
			// Si non, on a une erreur et on l'affiche
			if(msg == true) {
				// On vide la zone de texte
				$("#message").val('');
				$("#responsePost").slideUp("slow").html('');
			} else
				$("#responsePost").html(msg).slideDown("slow");
			// on resélectionne la zone de texte, en cas d'utilisation du bouton "Envoyer"
			$("#message").focus();
		},
		error: function(msg){
			// On alerte d'une erreur
			alert('Erreur');
		}
	});
}


// Au chargement de la page, on effectue cette fonction
$(document).ready(function() {
	// On vérifie que la zone de texte existe
	// Servira pour la redirection en cas de suppression de compte
	// Pour ne pas rediriger quand on est sur la page de connexion
	if(document.getElementById('message')) {
		// actualisation des membres connectés
		window.setInterval(getOnlineUsers, reloadTime);
		// actualisation des messages
		window.setInterval(getMessages, reloadTime);
		//window.setInterval(fail, reloadTime);
		// on sélectionne la zone de texte
		$("#message").focus();
	}
});


/**function getOnlineUsers()**/

function getOnlineUsers() {
	// On lance la requête ajax
	$.getJSON('phpscripts/get-online.php', function(data) {
		// Si data['error'] renvoi 0, alors ça veut dire que personne n'est en ligne
		// ce qui n'est pas normal d'ailleurs
		if(data['error'] == '0') {	
			var online = '', i = 1, image, text;
			// On parcours le tableau inscrit dans
			// la colonne [list] du tableau JSON
			for (var id in data['list']) {
				
				// On met dans la variable text le statut en toute lettre
				// Et dans la variable image le lien de l'image
				if(data["list"][id]["status"] == 'busy') {
					text = 'Occup&eacute;';
					//image = 'busy';
				} else if(data["list"][id]["status"] == 'inactive') {
					text = 'Absent';
					//image = 'inactive';
				} else {
					text = 'En ligne';
					//image = 'active';
				}
				// On affiche d'abord le lien pour insérer le pseudo dans la zone de texte
				online += '<a href="#post" onclick="insertLogin(\''+data['list'][id]["login"]+'\')" title="'+text+'">';
				// Ensuite on affiche l'image
				//online += '<img src="status-'+image+'.png" /> ';
				// Enfin on affiche le pseudo
				online += data['list'][id]["login"]+'</a>';
				
				// Si i vaut 1, ça veut dire qu'on a affiché un membre
				// et qu'on doit aller à la ligne			
				if(i == 1) {
					i = 0;	
					online += '<br>';
				}
				i++;			
			}
			$("#users").html(online);
		} else if(data['error'] == '1')
			$("#users").html('<span style="color:gray;">Aucun utilisateur connect&eacute;.</span>');
	});
}

function setStatus(status) {
	// On lance la requête ajax
	// type: POST > nous envoyons le nouveau statut
	$.ajax({
		type: "POST",
		url: "phpscripts/set-status.php",
		data: "status="+status.value,
		success: function(msg){
			// On affiche la réponse
			$("#statusResponse").html('<span style="color:green">Le statut a &eacute;t&eacute; mis &agrave; jour</span>');
			setTimeout(rmResponse, 3000);
		},
		error: function(msg){
			// On affiche l'erreur dans la zone de réponse
			$("#statusResponse").html('<span style="color:orange">Erreur</span>');
			setTimeout(rmResponse, 3000);
		}
	});
}

function rmResponse() {
	$("#statusResponse").html('');
}


</script>

			<title>Chat en ligne !</title>
		</head>

		<body>
		
		<a href="../index.php"><span class="glyphicon glyphicon-comment"></span><?php echo _(' Home  '); ?></a>
		
<div id="container">   <!-- probleme avec les balises <div> -->
				<h1>Chat en ligne !</h1>
				

			<!-- Statut //////////////////////////////////////////////////////// -->	
		<?php
// permettra de créer l'utilisateur lors de la validation du formulaire
if(isset($_POST['login']) AND !preg_match("#^[-. ]+$#", $_POST['login'])) {
	
/* On crée la variable login qui prend la valeur POST envoyée
car on va l'utiliser plusieurs fois */
$login = $_POST['login'];
$pass = $_POST['pass'];
			
// On crée une requête pour rechercher un compte ayant pour nom $login
$query = $db->prepare("SELECT * FROM chat_accounts WHERE account_login = :login");
$query->execute(array(
	'login' => $login
));
// On compte le nombre d'entrées
$count=$query->rowCount();
			
// Si ce nombre est nul, alors on crée le compte, sinon on le connecte simplement
if($count == 0) {			
	// Création du compte
	$insert = $db->prepare('
		INSERT INTO chat_accounts (account_id, account_login, account_pass) 
		VALUES(:id, :login, :pass)
	');
	$insert->execute(array(
		'id' => '',
		'login' => htmlspecialchars($login),
		'pass' => md5($pass)
	));
				
	/* Création d'une session id ayant pour valeur le dernier ID créé
	par la dernière requête SQL effectuée */
	$_SESSION['id'] = $db->lastInsertId();
	// On crée une session time qui prend la valeur de la date de connexion
	$_SESSION['time'] = time();
	$_SESSION['login'] = $login;
} else {
	$data = $query->fetch();	
				
	if($data['account_pass'] == md5($pass)) {			
		$_SESSION['id'] = $data['account_id'];
		// On crée une session time qui prend la valeur de la date de connexion
		$_SESSION['time'] = time();
		$_SESSION['login'] = $data['account_login'];
	}
}
			
// On termine la requête
$query->closeCursor();
}

/* Si l'utilisateur n'est pas connecté, 
d'où le ! devant la fonction, alors on affiche le formulaire */
if(!user_verified()) {
?>
				<div class="unlog">
					<form action="" method="post">
					Indiquez votre pseudo afin de vous connecter au chat. 
					Aucun mot de passe n'est requis. Entrez simplement votre pseudo.<br><br>
								
					<center>
						<input type="text" name="login" placeholder="Pseudo" /><br />
						<input type="password" name="pass" placeholder="Mot de passe" /><br /> 
						<input type="submit" value="Connexion" />
					</center>
					</form>
				</div>
<?php

} else {

?>

				<input type="hidden" id="dateConnexion" value="<?php echo $_SESSION['time']; ?>" />
				
				<table class="status"><tr>
					<td>
						<span id="statusResponse"></span>
						<select name="status" id="status" style="width:200px;" onchange="setStatus(this)">
							<option value="0">Absent</option>
							<option value="1">Occup&eacute;</option>
							<option value="2" selected>En ligne</option>
						</select>
					</td>
				</tr></table>
				
	
				<table class="chat"><tr>		
					<!-- zone des messages -->
										
					<td valign="top" id="text-td">
						<div id="annonce"></div>
						<div id="text">
							<div id="loading">
								<center>
								<span class="info" id="info">Chargement du chat en cours...</span><br />
								<img src="ajax-loader.gif" alt="patientez...">
								</center>
							</div>
						</div>
					</td>
							
					<!-- colonne avec les membres connectés au chat -->
					<td valign="top" id="users-td"><div id="users">Chargement</div></td> 					
				</tr></table>

				<!-- Zone de texte //////////////////////////////////////////////////////// -->
						<a name="post"></a>
					<table class="post_message"><tr>
					
						<td>
						<form action="" method="" onsubmit="postMessage(); return false;">
							<input type="text" id="message" maxlength="255" />
							<input type="button" onclick="postMessage()" value="Envoyer" id="post" />
						</form>
								<div id="responsePost" style="display:none"></div>
						</td>
					</tr></table>
					
	</div>
	
	</body> 
<?php

    }

?>
</html>


