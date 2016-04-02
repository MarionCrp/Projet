<!-- AFFICHAGE DES PARAMETRES DU PROFIL -->

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo _('My Profile'); ?></h3>
  </div>
  <div class="panel-body">
    <p> <?php echo _('Name'); ?> : <?= $current_user->name() ?> </p>
	<p> <?php echo _('Email Address'); ?> : <?= $current_user->email() ?></p>
	<p>  <?php echo _('Gender'); ?> : <?= $current_user-> gender() ?></p>
	<p><p><?= $current_user-> description() ?></p></p>
  </div>
 </div>

 <form action="index.php?page=home&section=edit_profile" method="post"> 
 	<button type="submit" class="btn btn-default" name="connexion"> <?php echo _('Edit my Profile'); ?></button>
 </form>
