<?php include('./controller/my_profile_controller.php'); ?>
<!-- AFFICHAGE DES PARAMETRES DU PROFIL -->

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo _('My Profile'); ?></h3>
  </div> 
  <div class="panel-body">
    <row>
       <div class="col-md-7">
       <legend><?php echo _('My Information'); ?> </legend>
        <b> <?php echo _('Name'); ?> </b>: <?= $current_user->name() ?> </p>
      	<b> <?php echo _('Email Address'); ?></b>: <?= $current_user->email() ?></p>
      	<b> <?php echo _('Gender'); ?></b> : <?= $current_user-> gender() ?></p>
      	<b> <?php echo _('Current City'); ?></b> : <?= $city_manager->getCityName($current_user->cityId()); ?> </p>
      	<b> <?php echo _('Nationality'); ?></b> : <?= $country_manager->getCountryName($current_user->nationalityId()); ?> </p>
      	<b> <?php echo _('How you describe yourself'); ?> </b> : <p><?= $current_user-> description() ?></p>
      </div>

        <div class="col-md-5">
        <legend><?php echo _('My Languages'); ?> </legend>
          <?php display_language_level($current_user, $spoken_language_manager); ?> 
        </div>
      </div>
    </row>
 </div>

 	<a href="index.php?page=home&section=edit_profile" type="submit" class="btn btn-default" name="connexion"> <?php echo _('Edit my Profile'); ?></a>

