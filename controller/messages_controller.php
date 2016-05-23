<?php 
include('controller/send_message_controller.php');

if(isset($_SESSION['user'])) {
	$current_user_id = $current_user->id();

	/* On vérifie qu'un id utilisateur est bien présent dans la barre d'adresse */
	if(!isset($_GET['user_id'])) {
		$user_exists = false;

	/* On vérifie que l'utilisateur demandé existe dans la base de donnée */
	} else {
		$user_id = (int) htmlspecialchars($_GET['user_id']); /* si le paramètre GET n'est pas un int, $user_id sera de 0 */
		$user_exists = $user_manager->exists($user_id, 'id');
		if($user_exists){
			$posts = $message_manager->getDiscussion($user_id, $current_user_id);
			$alien = $user_manager->getDatas($user_id);
		} else {
			echo "<script type='text/javascript'> document.location.replace('index.php?page=home&section=user_not_found'); </script>";
		}
		
	}


}
