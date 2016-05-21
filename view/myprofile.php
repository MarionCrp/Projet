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
        <b> <?php echo _('Name'); ?> </b>: <?= $current_user->name() ?><img src="assets/images/<?= Form::getGenderIcon($current_user); ?>.png" width=30 alt=<?php echo '"'.$current_user->gender().'"'; ?> /> <br/>
      	<b> <?php echo _('Email Address'); ?></b>: <?= $current_user->email() ?></p>

      	<legend><?php echo _('Localization'); ?> </legend>
        <b> <?php echo _('Current City'); ?></b> : <?= $city_manager->getCityName($current_user->cityId()); ?> <br/>
      	<b> <?php echo _('Nationality'); ?></b> : <?= $country_manager->getCountryName($current_user->nationalityId()); ?> <br/>
      	<legend> <?php echo _('Description'); ?> : </legend></b> <p>
        <?php
        if(ctype_space($current_user->description()) OR empty($current_user->description())){
          echo _('No Description');
        } else {
          echo $current_user->description();
        }

          ?>
      </div>

        <div class="col-md-5">
        <legend><?php echo _('My Languages'); ?> </legend>

          <?php 
          if($spoken_languages){
            foreach($spokenLanguages as $spokenLanguage){
              echo '<p>'.$spokenLanguage['language'].'</p>';
              Form::level_form($spokenLanguage['level']);
            }
          } else {
            echo '<p>'._('No language has been added').'</p>';
          }
          ?>
        </div>
      </div>
    </row>
 </div>

 	<a href="index.php?page=home&section=edit_profile" type="submit" class="btn btn-default" name="connexion"> <?php echo _('Edit my Profile'); ?></a>

