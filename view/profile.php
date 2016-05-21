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
       <?php
       if($user_found) {
       	?>
	       	<legend><?php echo _('Details'); ?> </legend>
	        <b> <?php echo _('Name'); ?> </b>: <?= $user->name() ?> <img src="./assets/images/<?= Form::getGenderIcon($user); ?>.png" width=30 />  </p>
	      	<b> <?php echo _('Current City'); ?></b> : <?= $city_manager->getCityName($user->cityId()); ?> </p>
	      	<b> <?php echo _('Nationality'); ?></b> : <?= $country_manager->getCountryName($user->nationalityId()); ?> </p>
	      	<legend> <?php echo _('Description'); ?> : </legend></b> 
            <p><?php
              if(ctype_space($current_user->description()) OR empty($current_user->description())){
                  echo _('No Description');
              } else {
                  echo $current_user->description();
        } ?>
          </p>
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
       <form method="get" action="">
          <input type="hidden" value="mymessages" name="section">
          <input type="hidden" value=<?= $user->id() ?> name="user_id">
          <input type="submit" class="btn btn-default navbar-btn" value="<?php echo _('Send a message'); ?>" /><br/>
       </form>   
      
      </div>
      
    </row>

 </div>
