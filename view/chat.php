<!doctype html>
<html>
<?php session_start(); ?> 

	<head>
	
	    <meta charset="utf-8" />		
		<link rel="stylesheet" type="text/css" href="../assets/css/css/stylechat.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<title>Chat en ligne !</title>
	</head>

	<body>

		<div class="bloc_chat">
			<div class="thumbnail"> 
	            <div class="panel-default">
	                <div class="panel-heading"> Chat en ligne </div>
	                    <div class="panel-body">
	                        
							<table class="status"><tr>
							<a href="../index.php"><BUTTON id="retourMenu">Revenir au site principal</BUTTON></a>
								<td>
									<span id="statusResponse"></span>
									<select name="status" id="status" style="width:200px;" onchange="setStatus(this)">
										<option value="0">Absent</option>
										<option value="1">Occup&eacute;</option>
										<option value="2" selected>En ligne</option>
									</select>
								</td>
							</tr></table>
							
				
						<table class="chat">
						<tr>		
							<!-- zone des messages -->
												
							<td valign="top" id="text-td">
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
						</tr>
						</table>

						<!-- Zone de texte //////////////////////////////////////////////////////// -->
						<a name="post"></a>
						<table class="post_message">
							<tr>

							
								<td>
								<form action="" method="" onsubmit="postMessage(); return false;">
									<input type="text" id="message" maxlength="255" />
									<input type="button" onclick="postMessage()" value="Envoyer" id="post" />
								</form>
										<div id="responsePost" style="display:none"></div>
								</td>
							</tr>
						</table>
					</div>
                    <!-- fin panel-body -->
                </div>
                <!-- fin panel-default -->
	        </div>
	        <!-- fin thumbnail -->
		</div>
			
	<script src="jquery-2.2.3.min.js"></script>
	<script type="text/javascript">


	   
	window.addEventListener("load",	function() {
		
		document.getElementById('retourMenu')
			.addEventListener("click", function(){
				deleteOnline();
			});
			
		
		var statutEnLigne = HTMLSelectElement;
		statutEnLigne.value = 2;
		setStatus(statutEnLigne);
	});	

	/**function insertLogin(login)**/

	function insertLogin(login) {
		var $message = $("#message");
		$message.val($message.val() + login + ' >>> ').focus();
	}

	/**variables de gestion de temps**/
	var reloadTime = 1000;
	var scrollBar = false;

	function deleteOnline()
	{
			
		$.ajax({
			type: "GET",
			url: "chatScripts/delete-online.php",
			success: function(msg){
				
				//$("#users").html(msg);
					
			},
			error: function(msg){
				// On alerte d'une erreur
				alert('Erreur');
			}
		});
	}


	/**function getMessages()**/
	function getMessages() {	
		// On lance la requête ajax
		
		$.ajax({
			type: "GET",
			url: "chatScripts/get-message.php",
			success: function(msg){
				
				$("#text").html(msg);
					
			},
			error: function(msg){
				// On alerte d'une erreur
				alert('Erreur');
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
			url: "chatScripts/post-message.php",
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
		
		$.ajax({
			type: "GET",
			url: "chatScripts/get-online.php",
			success: function(msg){
				
				$("#users").html(msg);
					
			},
			error: function(msg){
				// On alerte d'une erreur
				alert('Erreur');
			}
		});
	}
		

	function setStatus(status) {
		// On lance la requête ajax
		// type: POST > nous envoyons le nouveau statut
		$.ajax({
			type: "POST",
			url: "chatScripts/set-status.php",
			data: "status="+status.value,
			success: function(msg){
				// On affiche la réponse
				$("#statusResponse").html('<span style="color:white">Le statut a &eacute;t&eacute; mis &agrave; jour</span>');
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
</body> 
</html>


