<?php

/**
* Gestion de l'édition des attributs de Localisation (ville actuelle et nationalité)
**/
if (isset($_POST['edit_localization'])) {
	if(!empty($_POST['country'])){
		if(empty($_POST['city'])) $error = '<p style="color:red">'._('Please fill all the form bellow to edit you\'re current city.'). '</p>';
		else {
			var_dump($user_manager->edit($current_user->id(), 'cityId', $_POST['city']));
			echo ('<p style="color:green;">' ._('The city where you\'re living has been modified').  '</p>');
			$current_user = $user_manager->getDatas($current_user->id());
			$_SESSION['user'] = $current_user;
		}
	}

	if(isset($_POST['nationality']) AND ($_POST['nationality'] != $current_user->nationalityId())){
		$user_manager->edit($current_user->id(), 'nationalityId', $_POST['nationality']);
		echo ('<p style="color:green;">' ._('Your nationality has been modified').  '</p>');
		$current_user = $user_manager->getDatas($current_user->id());
		$_SESSION['user'] = $current_user;
	}
}

?>