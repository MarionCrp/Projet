<?php 
//Profil d'un utilisateur
include('./controller/profile_controller.php'); ?>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo _($title) ?></h3>
  </div>
  <div class="panel-body">
    <row>
       <div class="col-md-7">
       <?php var_dump($user_found);
       if($user_found) {
       	?>
	       	<legend><?php echo _('My Information'); ?> </legend>
	        <b> <?php echo _('Name'); ?> </b>: <?= $user->name() ?> </p>
	      	<b> <?php echo _('Gender'); ?></b> : <?= $user-> gender() ?></p>
	      	<b> <?php echo _('Current City'); ?></b> : <?= $city_manager->getCityName($user->cityId()); ?> </p>
	      	<b> <?php echo _('Nationality'); ?></b> : <?= $country_manager->getCountryName($user->nationalityId()); ?> </p>
	      	<b> <?php echo _('Description'); ?> </b> : <p><?= $user-> description() ?></p>
       </div>

        <div class="col-md-5">
        <legend><?php echo _('Languages'); ?> </legend>
          <?php foreach($spokenLanguages as $spokenLanguage){
            echo '<p>'.$spokenLanguage['language'].'</p>';
            Form::level_form($spokenLanguage['level']);
          }
          ?>
        </div>
       <?php } ?>    
      </div>
    </row>
 </div>
