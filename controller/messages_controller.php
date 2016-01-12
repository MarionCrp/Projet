<?php
include ('send_message_controller.php');

if (isset($_SESSION['user']))
	{
		if(!isset($_GET['author_id']))
		{
			$messages = $message_manager->getListOfMessages($current_user);
			foreach ($messages as $message) 
			{	
			?> 
				<form method="get" action="">
					<input type="hidden" value="mymessages" name="page">
					<?php
					echo '<h3>'.$message_manager->getAuthor($message).'</h3>';
					echo '<p>'.$message->content().
					'<input type="hidden" value="'.$message->author_id().'" name="author_id">';
					?>
					<input type="submit" class="btn btn-default navbar-btn" value="Répondre" />
					</p>
				</form>
			<?php
			}
		}

		else
		{
			$author_id = htmlspecialchars($_GET['author_id']);
			$author_id = (int) $author_id;
			$current_user_id = $current_user->id();
			$posts = $message_manager->getDiscussion($author_id, $current_user_id);

			foreach ($posts as $post)
			{
				echo '<h3>'.$message_manager->getAuthor($post).'</h3>';
				echo '<p>'.$post->content(). '</p>';
			} 
			?>

			<form method="post" action="">
			<textarea name="content" id="content" rows="10" cols="120" /></textarea><br/>
			<input type="hidden" name="current_user_id" value=<?= $current_user_id ?> />
			<input type="hidden" name="recipient_id" value=<?= $author_id ?> />
			<input type="submit" class="btn btn-default navbar-btn" value="Envoyer" />

			</form>

			<br/><a href="index.php?page=mymessages">
			<button type="button" class="btn btn-default navbar-btn">Retour à la liste des messages</button></a><br/> 
			<?php
		}
	}
