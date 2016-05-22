<?php 
//Profil d'un utilisateur
include('./controller/profile_controller.php'); 

if($user_found) {
?>   


  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><?php echo $title ?></h3>
    </div>
    <div class="panel-body">
          <div class="row">
           <div class="col-md-7">
  	       	<p class="legend"><?php echo _('Details'); ?> </p>
  	        <p><b> <?php echo _('Name'); ?> </b>:<?= $user->name() ?> <img src="./assets/images/<?= Form::getGenderIcon($user); ?>.png" width=30 alt="<?= 'image_'.Form::getGenderIcon($user); ?>" /></p>
  	      	<p><b> <?php echo _('Current City'); ?></b> : <?= $city_manager->getCityName($user->cityId()); ?> </p>
  	      	<p><b> <?php echo _('Nationality'); ?></b> : <?= $country_manager->getCountryName($user->nationalityId()); ?> </p>
  	      	<p class="legend"> <?php echo _('Description'); ?> : </p>
              <p><?php
                if(ctype_space($user->description()) OR empty($user->description())){
                    echo _('No Description');
                } else {
                    echo $user->description();
                } ?>
               </p>
            </div>

          <div class="col-md-5">
          <p class="legend"><?php echo _('Languages'); ?> </p>

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
          </div><!-- en row -->
         <a href="<?= 'index.php?page=home&section=messages&user_id='.$user->id(); ?>" class="btn btn-default"> <?php echo _('Send a message'); ?></a>
   </div>
  </div>
<?php
}