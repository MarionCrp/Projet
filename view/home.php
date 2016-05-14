	<?php
	
	
		
	/* L'UTILISATEUR EST CONNECTE :
	 on affiche les fonctionnalités utilisateurs (menu déroulant
	 											 + section (sous-page) appellée (section par défaut = la liste des utilisateurs inscrits) */
												  

		if (isset($_SESSION['user'])) 
		{
			?>

				   		<!-- ***** BANDEAU DE RECHERCHE D'UTILISATEURS ***** -->

	    	<!-- <div id="zone_opacity"> 	 -->

	    	<div class="panel panel-default research">
			  <div class="panel-heading">
			   <div class="text-center"> <?php echo _("Meet someone "); ?> </div>	
			  </div>
	   		  <div class="panel-body">						
				<form class="form-inline text-center" method="POST" action="#">
				  <div class="form-group">
				    <label class="sr-only" for="cityName"></label>
				   Living in <input type="text" class="form-control" name="cityName" id="cityName" placeholder="<?php echo _("Enter your City") ;?> ">
				  </div>

				  <!-- <div class="form-group">
				    <div class="input-group">
				      <div class="input-group-addon"><?php echo _("I want to meet someone speaking "); ?></div>
				    </div>
				  </div> -->

				  <div class="form-group"> 
				  Speaking
						<select class="form-control" name="languageId">
						  <?php Form::languages($language_manager); ?>
						</select>
				  </div>

				  <button type="submit" class="btn btn-default" name="search_user"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> <?php echo _('Search'); ?> </button>

				</form>
			  </div> 
			</div>


		<!-- / FIN bandeau de recherche utilisateur -->

			<div class="row">
				<div class="col-md-3"><!-- Large button group -->
					<div class="btn-group">
					  <button class="btn btn-default btn-lg dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-align-justify"></span>
					    Menu 
					  </button>
					  <ul class="dropdown-menu" role="menu">
					    <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?page=home&section=myprofile"><span class="glyphicon glyphicon-user"></span><?php echo _(' My Profile '); ?></a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?page=home&section=mymessages"><span class="glyphicon glyphicon-envelope"></span><?php echo _(' My Messages '); ?></a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?page=home&section=userslist"><span class="glyphicon glyphicon-globe"></span><?php echo _(' People '); ?></a></li>
					 	<li role="presentation"><a role="menuitem" tabindex="-1" href="view/chat.php"><span class="glyphicon glyphicon-comment"></span><?php echo _(' Chatting Room '); ?></a></li>					  
					 	<!--<li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?page=home&section=chat"><span class="glyphicon glyphicon-comment"></span><?php echo _(' Chatting Room '); ?></a></li>					  
						-->
					  </ul>
					</div>
				</div>





				  <!-- INCLUSION DES SECTIONS (SOUS-PAGES) -->

				  <div class="col-md-9">



				  <?php if(isset($_GET['section'])) 
						{
							$section = $_GET['section'];
						}

						else 
						{
							$section = 'userslist';
						}

						include ($section.'.php');

			       ?>
				  </div>
			</div>
			<!-- FIN inclusion de section en mode CONNECTE -->


			
			<?php } else { ?>

			<!-- AFFICHAGE DE LA PRESENTTION DU SITE LORSQU'UN VISITEUR N'EST PAS CONNECTE -->


				<div class="jumbotron deconnected">
						<p> 
                        
                        <H2> <?php echo _(' Welcome to our supervised project. This project is a multicultural meeting Website. Its purpose is to link together :'); ?> </H2>
							<br/>
							<li><?php echo _('People with different nationalities to allow cultural and linguistic exchanges.'); ?></li>
							<li><?php echo _('People with a common nationality for expatriates who miss their countries ! '); ?></li>
							<br/>
							<?php echo _('We are three students in informatics (Bachelor), and we are beginners in Web programming.'); ?>
							<br/>
							<?php echo _('This project is an opportunity for us to **learn**  and  **apply** directly languages we are working on during courses. '); ?>
							<br/>
							<H2><?php echo _('Technologies used previously :'); ?></H2>
							<br/>
							<li><?php echo _('HTML5 / CSS3 / Bootstrap'); ?></li>
							<li><?php echo _('PHP ( object oriented programming )'); ?></li>
							<li><?php echo _('MySQL'); ?></li>
							<li><?php echo _('Javascript (jQuery/Ajax)'); ?></li>
							<?php echo _('The purpose being to get the code evolving regarding the technologies learnt at our university and self-study ( including MVC model ... )'); ?>
							<br/>
							<br/>
							<?php echo _('Marion, Kévin and Loïc'); ?><br/>
            
                                
						</p>

				</div>
			
			<?php } ?>

			<!-- FIN inclusion préentation du site en mode DECCONECTE -->
