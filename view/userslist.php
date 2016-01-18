<?php

$users = $user_manager->getList();
	foreach ($users as $user) 
	{
		if ($user == $current_user) continue;
		
		?>

		<form method="get" action="">
		<div class="user_profil_box">
			<input type="hidden" value="mymessages" name="page">
			<h2> <?= $user->name(); ?> </h2>
			<p> <?= $user->description(); ?> </p>
			<input type="hidden" value=<?= $user->id() ?> name="user_id">
			<input type="submit" class="btn btn-default navbar-btn" value="Envoyer un message" />
		</div>
		</form> 
		

		<?php
	}