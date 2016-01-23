<?php
include ('send_message_controller.php');

if (isset($_SESSION['user']))
	{
		// Sur la page des messages reçus
		if(!isset($_GET['user_id']))
		{
			$messages = $message_manager->getListOfMessages($current_user);

			if (empty($messages)) echo '<p>Vous n\'avez pas reçu de message </p>';

			foreach ($messages as $message) 
			{	
			?> 

					<div class="panel panel-default">
					    <div class="panel-heading">
					    	<h3 class="panel-title"> <h3><?= $message_manager->getAuthor($message) ?></h3>
					    							 </h3>
					    							 <p><?= $message->datetime() ?></p>

						</div>
					  	<div class="panel-body">
					  		<p> <?= $message->content() ?> </p>	
						  	<form method="get" action="">
								<input type="hidden" value="home" name="page">
								<input type="hidden" value="mymessages" name="section">
								<input type="hidden" value=<?= $message->author_id() ?> name="user_id">
								<input type="submit" class="btn btn-default navbar-btn" value="Répondre" />
							</form>		   	
					  	</div>
					</div>
			<?php
			}
		}


		// Sur la page de message d'un profil particulier
		else
		{

			
			$user_id = htmlspecialchars($_GET['user_id']);
			$user_id = (int) $user_id;
			$current_user_id = $current_user->id();
			$posts = $message_manager->getDiscussion($user_id, $current_user_id);

			foreach ($posts as $post)
			{
				?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">
							 <h3><?php 
						if ($post->author_id() == $current_user->id()) echo 'Vous';
						else echo $message_manager->getAuthor($post) ?>
							</h3> 
							<p> <?= $post->datetime(); ?>

						</h3>
					</div>
				  	<div class="panel-body">
				  		<p> <?= $post->content(); ?> </p>	
				  	</div>
				 </div>

			  	<?php
				
			} 
			?>

			<form method="post" action="">
			<textarea name="content" id="content" rows="10" cols="120" /></textarea><br/>
			<input type="hidden" name="current_user_id" value=<?= $current_user_id ?> />
			<input type="hidden" name="recipient_id" value=<?= $user_id ?> />
			<input type="submit" class="btn btn-default navbar-btn" value="Envoyer" />

			</form>

			<br/><a href="index.php?page=home&section=mymessages">
			<button type="button" class="btn btn-default navbar-btn">Retour à la liste des messages</button></a><br/> 
			<?php
		}
	}
