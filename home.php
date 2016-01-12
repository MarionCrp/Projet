<div class="row">
 	<div class="col-xs-6">
  		<?php
  		include('myprofile.php'); ?>
  	</div>
  

	<div class="col-md-6 users_list">
	<p> Nombre d'utilisateurs inscrits : <?= $user_manager->count(); ?> </p>
	<?php

		if (isset($_SESSION['user'])) 
		{
			$users = $user_manager->getList();
			foreach ($users as $user) 
			{
				if ($user == $current_user) continue;
				
				?>

				<div class="user_profil_box">
					<h2> <?= $user->name(); ?> </h2>
					<p> <?= $user->description(); ?> </p>

					<input type="submit" value="Envoyer un message">
				</div>

				<?php
			}
		} ?>
	</div>
</div>




