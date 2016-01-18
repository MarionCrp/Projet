<?php

$users = $user_manager->getList();

	foreach ($users as $user) 
	{
		if ($user == $current_user) continue;
		
		?>

		<div class="panel panel-default">
		    <div class="panel-heading">
		    	<h3 class="panel-title"> <h3><?= $user->name(); ?> ( <?= $user->gender(); ?> )</h3> </h3>
			</div>
			  	<div class="panel-body">
			  		<p> <?= $user->description(); ?> </p>	
				  	<form method="get" action="">
				   		<input type="hidden" value="mymessages" name="page">
				  		<input type="hidden" value=<?= $user->id() ?> name="user_id">
						<input type="submit" class="btn btn-default navbar-btn" value="Envoyer un message" />
					</form>		   	
			  	</div>
		</div>

		<?php
	}