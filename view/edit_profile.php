<!-- FORMULAIRE DE MODIFICATION DE COMPTE -->

	  	<div class="panel panel-default">
		 	<div class="panel-heading">
		   		 <h3 class="panel-title"><?php echo _(" Edit you account "); ?></h3>
		  	</div>
		  
		 	<div class="panel-body">

				<nav>
					<ul class="nav nav-tabs nav-justified">
			  		<li <?php if (!isset($_GET['edit']) OR $_GET['edit'] == "general") echo 'class="active"'; ?>><a href="index.php?page=home&section=edit_profile&edit=general"> <?php echo _('General '); ?></a></li>
			  		<li <?php if (isset($_GET['edit']) AND $_GET['edit'] == "password") echo 'class="active"'; ?>><a href="index.php?page=home&section=edit_profile&edit=password"> <?php echo _('Password') ; ?></a></li>
			  		<li <?php if (isset($_GET['edit']) AND $_GET['edit'] == "localization") echo 'class="active"'; ?>><a href="index.php?page=home&section=edit_profile&edit=localization"> <?php echo _('Localization'); ?></a></li>
					<li <?php if (isset($_GET['edit']) AND $_GET['edit'] == "language") echo 'class="active"'; ?>><a href="index.php?page=home&section=edit_profile&edit=language"> <?php echo _('Language'); ?></a></li>
					</ul>
				</nav>

				<?php
					if(isset($_GET['edit'])) {
						$edit = 'edit_profile_'.$_GET['edit'].'.php';
					}
					else $edit = 'edit_profile_general.php';
					include('view/'.$edit);
				?>

				<a href="index.php?page=home&section=myprofile" class="btn btn-default"> <?php echo _('Back to my Profile'); ?></a>

		<!-- <form action="" method="post"><input type="submit" value="Supprimer mon compte" name="delete_account"></form> -->
		 	</div><!-- Form-Panel-Body -->
		</div><!-- panel panel-default -->
	</div> <!-- col-md-6 -->
	<div class="col-md-3"></div>
</div> <!-- row