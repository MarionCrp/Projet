<?php include('controller/messages_controller.php');
include('controller/send_message_controller.php');

	// Si l'utilisateur entré en paramètre existe dans la base de données : 
	if($user_exists){
		if($posts) {
			/* AFFICHAGE DES MESSAGES */
			foreach ($posts as $post) {
				// Formatage de la date
				if(isset($_COOKIE['lang'])) $lang = $_COOKIE['lang'];
				else $lang = 'en_US';
				$date = $form->format_date($post->datetime(), $lang);

				// On vérifie pour chaque poste s'il a déjà été lu par l'utilisateur. 
				$is_read = $post->is_read();

			?>
			<div class="panel panel-default">
			 	<div class="panel-heading">
			  			<h3 class="panel-title">
							 <h3><?php 
									if ($post->author_id() == $current_user->id()){
										$current_user_message = true;
										echo _('You');
										$position_class = "text-right";
									}
									else {
										$current_user_message = false;
										echo $message_manager->getAuthor($post);
										$message_manager->setRead($post);
										$position_class= "";
									}				
								?>
							</h3> 
						</h3>
				</div>
			  	<div class="panel-body">
				  	<div class="message-title">
				  		<p class="<?= $position_class ?>"> 
				  		<?= _('Sent at ').$date; ?> </p>
				  		<?php  if ($current_user_message && $post->is_read()) echo '<p>'._('Read').'</p>'; ?>
				  	</div>
				  	<p class="<?= $position_class; ?>">
			  		 <?= $post->content(); ?> </p>	
			  	</div>
			 </div>

			  	<?php
			} // Fin de la liste de message
		// Si les personnes ne se sont pas encore écrites : 
		} 

		?>

		<!-- FIN affichage des messages -->

	<!-- FORMULAIRE D'ENVOIE DE MESSAGES -->

	<div class="panel panel-default">
	 	<div class="panel-heading">
	  			<h3 class="panel-title">
					 <?php echo _('Send a Message'); ?>
				</h3>
		</div>
	  	<div class="panel-body">
	  	<?php if($posts == null){
				 echo _('You have not talk yet to '); 
	 			 echo $alien->name().'. ';
	 			 echo _(' Make the first step !');
	  	}

	  	?>
		 	<form  action="#" method="post" class="form-horizontal">
				<div class="form-group">
			 	   <label class="col-sm-1 control-label"></label>

				    <div class="col-sm-10">
				        <input type="hidden" name="current_user_id" value=<?= $current_user_id ?> />
					    <input type="hidden" name="recipient_id" value=<?= $user_id ?> />

					  <!-- Si l'utilisateur envoie un message vide, on affiche une erreur sans envoyer ce message -->
					 <?php if(isset($_POST["envoie"]) and empty($_POST["content"])) echo '<p class="fail">'._("Please, write a message").'</p>'; ?>

				        <textarea class="form-control" rows="3" placeholder= "<?php echo _('Your Message'); ?>" name="content"></textarea>
					    <input type="submit" class="btn btn-default navbar-btn" value=<?php echo _("Send"); ?> name="envoie" /><br/>
					    <a href="<?= 'index.php?page=home&section=profile&id='.$user_id; ?>" class="btn btn-default navbar-btn"><?php echo _('Profile'); ?></a>
				    </div>
				</div>
			</form>
		</div>
	</div>

	<!-- fin Formulaire d'envoie de messages  -->
	
<?php  } else {
	echo _('User not found');
}

