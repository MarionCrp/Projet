<!-- AFFICHAGE DES PARAMETRES DU PROFIL -->

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo _('My Profile'); ?></h3>
  </div> 
  <div class="panel-body">
    <row>
       <div class="col-md-6">
        <p> <?php echo _('Name'); ?> : <?= $current_user->name() ?> </p>
      	<p> <?php echo _('Email Address'); ?> : <?= $current_user->email() ?></p>
      	<p> <?php echo _('Gender'); ?> : <?= $current_user-> gender() ?></p>
      	<p> <?php echo _('Current City'); ?> : <?= $city_manager->getCityName($current_user->cityId()); ?> </p>
      	<p> <?php echo _('Nationality'); ?> : <?= $country_manager->getCountryName($current_user->nationalityId()); ?> </p>
      	<p><p><?= $current_user-> description() ?></p></p>
      </div>
        <div class="col-md-6">
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
              
            </div>
</div>
        </div>
      </div>
    </row>
 </div>

 <form action="index.php?page=home&section=edit_profile" method="post"> 
 	<button type="submit" class="btn btn-default" name="connexion"> <?php echo _('Edit my Profile'); ?></button>
 </form>
