<?php include('controller/mymessages_controller.php'); ?>
<?php
if (empty($messages)) { ?>
<div class="panel panel-default">
	<div class="panel-heading">
		<?= _('No message received yet'); ?>
	</div>
</div>
<?php
} else {
		foreach ($messages as $message) {
			if(isset($_COOKIE['lang'])) $lang = $_COOKIE['lang'];
			else $lang = 'en_US';
			$date = $form->format_date($message->datetime(), $lang);
			if ($message_manager->stillMessagesToRead($current_user, $message->author_id())){
				$new = array(
					'title' => _('New'),
					'class' => 'panel panel-success'
					);
			} else {
				$new = array(
					'title' => '',
					'class' => 'panel panel-default'
					);
		}
?>
<div class="<?php echo $new['class']; ?>">
	<div class="panel-heading">
		<div class="panel-title message-title">
			<h3><?= $message_manager->getAuthor($message) ?></h3>
			<h3 class="new"><?= $new['title']; ?> </h3>
		</div>
	</div>
	<div class="panel-body">
		<p><?php echo _('Sent at ').$date ?></p>
		<p> <?php
			if (strlen($message->content()) > 50) {
			echo substr($message->content(), 0, 50).'...';
			} else {
				echo $message->content();
			}
			?>
		</p>
		<form method="get" action="">
			<input type="hidden" value="home" name="page">
			<input type="hidden" value="mymessages" name="section">
			<input type="hidden" value=<?= $message->author_id() ?> name="user_id">
			<!-- <input type="submit" class="btn btn-default navbar-btn clic-messages" value= "<?php echo _('Read the message'); ?>" /> -->
			<a href="<?= 'index.php?page=home&section=messages&user_id='.$message->author_id(); ?>" class="btn btn-default navbar-btn clic-messages"><?= _('Read the message'); ?> </a>
		</form>
	</div>
</div>
<?php
	}
}
?>
