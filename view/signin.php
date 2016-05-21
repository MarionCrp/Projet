<!-- Inclusion du controleur relatif à la connexion -->
<?php include('controller/signin_controller.php') ?>

<!-- PAGE DE CONNEXION -->

	<!-- FORMULAIRE DE CONNEXION -->

	<div class="row">
	  <div class="col-md-3"></div>
	  <div class="col-md-6 deconnected">
	  
	  	<div class="panel panel-default">
		 	<div class="panel-heading">
		   		 <h3 class="panel-title"><?php echo _('Sign In') ;?></h3>
		  	</div>
		  
		 	<div class="panel-body">

			 	<form  action="" method="post" class="form-horizontal" role="form">
					  <div class="form-group">
						<label for="email" class="col-sm-2 control-label"><?php echo _('Email Adress') ;?></label>
						    <div class="col-sm-10">
						      <input type="email" class="form-control" name="email" placeholder="Email">
						    </div>
					  </div>

					  <div class="form-group">
					    <label for="password" class="col-sm-2 control-label"><?php echo _('Password') ;?></label>
						    <div class="col-sm-10">
						      <input type="password" class="form-control" name="password" placeholder="Password">
						    </div>
					  </div>
					  
					  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      <button type="submit" class="btn btn-default" name="connexion"><?php echo _('Sign in') ;?></button>
						    </div>
		 			  </div>

				</form>

				<hr/>

				<form action="index.php" method="post">
				<button type="submit" class="btn btn-default"><?php echo _('Go back to the Main Page') ;?></button>
				</form>

					
		 	</div><!--/panel-body -->
		</div><!--/panel -->

	  </div><!--/col-md-6 -->

		  <div class="col-md-3"></div>
	</div><!--/row -->

	<!-- FIN formulaire de connexion -->