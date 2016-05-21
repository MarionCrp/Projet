<?php

if (isset($_SESSION['user'])) {
		$current_user_id = $current_user->id();
		$messages = $message_manager->getListOfMessages($current_user);
}



