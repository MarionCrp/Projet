<?php 

if(isset($_SESSION['user']))
{

?>
		<div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">Mon Profil</h3>
		  </div>
		  <div class="panel-body">
		    <p> Nom : <?= $current_user->name() ?> </p>
			<p> Email :  <?= $current_user->email() ?></p>
			<p> Sexe : <?= $current_user-> gender() ?></p>
			<p><p><?= $current_user-> description() ?></p></p>
		  </div>
		 </div>

 <form action="index.php?page=home&section=edit_profile" method="post"><input type="submit" value="Modifier mon profil"></form>

		
	<?php
	}
?>

