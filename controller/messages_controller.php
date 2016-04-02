<?php
include ('send_message_controller.php');

if (isset($_SESSION['user']))
	{
		// Sur la page des messages reçus
		if(!isset($_GET['user_id']))
		{
			$messages = $message_manager->getListOfMessages($current_user);

			if (empty($messages)) echo _('<p> You have not yet received message</p>');

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
								<input type="submit" class="btn btn-default navbar-btn" value="<?php echo _("Reply"); ?>" />
							</form>		   	
					  	</div>
					</div>
			<?php
			}
		}


		// Sur la page de message d'un profil particulier
		else
		{

			/* On réupère les données relatives au profil visité, stoquée dans user_id*/
			
			$user_id = htmlspecialchars($_GET['user_id']);
			$user_id = (int) $user_id;

			/* On récupère les messages échangés entre l'utilisateur connecté et l'utilisateur dont il visite le profil*/
			$current_user_id = $current_user->id();
			$posts = $message_manager->getDiscussion($user_id, $current_user_id);

			/* AFFICHAGE DES MESSAGES */
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

			<!-- FIN affichage des messages -->

		<!-- FORMULAIRE D'ENVOIE DE MESSAGES -->

	  	<div class="panel panel-default">
		 	<div class="panel-heading">
		   		 <h3 class="panel-title">Envoyer un message</h3>
		  	</div>
		  
		 	<div class="panel-body">

			 	<form  action="" method="post" class="form-horizontal" role="form">
					<div class="form-group">
				 	   <label for="message" class="col-sm-1 control-label"></label>

					    <div class="col-sm-10">
					      <input type="hidden" name="current_user_id" value=<?= $current_user_id ?> />
						  <input type="hidden" name="recipient_id" value=<?= $user_id ?> />

						  <!-- Si l'utilisateur envoie un message vide, on affiche une erreur sans envoyer ce message -->
						  <?php if(isset($_POST["envoie"]) and empty($_POST["content"])) echo "Votre message est vide. Veuillez entrer un message"; ?>

					      <textarea class="form-control" rows="3" placeholder="Votre Message" name="content"></textarea>
					    <input type="submit" class="btn btn-default navbar-btn" value="Envoyer" name="envoie" />
					    </div>
					</div>
				</form>

			</div>
		</div>

		<!-- fin Formulaire d'envoie de messages  -->

		<br/><a href="index.php?page=home&section=mymessages">
				<button type="button" class="btn btn-default navbar-btn">Retour à la liste des messages
				</button>
			</a><br/> 


			<?php
		}
	}
