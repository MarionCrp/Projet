	<?php
												  

		if (isset($_SESSION['user'])) 
		{
			$new_messages_nb = $message_manager->stillMessagesToRead($current_user);

			?>


	    	<div class="panel panel-default research">
			  <div class="panel-heading">
			   <div class="text-center"> <?php echo _("Meet someone "); ?> </div>	
			  </div>
	   		  <div class="panel-body">						
				<form class="form-inline text-center" method="POST" action="index.php?page=home&section=userslist">
				  <div class="form-group">
				    <label class="sr-only" for="cityName"></label>
				   <?php echo _('Living in'); ?> <input type="text" class="form-control" name="cityName" id="cityName" placeholder="<?php echo _("Enter your City") ;?> ">
				  </div>

				  <div class="form-group"> 
				  <?php echo _('Speaking'); ?>
						<select class="form-control" name="languageId">
						  <?php Form::languages($language_manager); ?>
						</select>
				  </div>

				  <button type="submit" class="btn btn-default" name="search_user"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> <?php echo _('Search'); ?> </button>

				</form>
			  </div> 
			</div>



			<div class="row">


				<div class="col-md-3">
					<div class="btn-group">
					
			<?php	if ($new_messages_nb > 0) { ?>
						<button class="btn btn-info btn-lg dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-envelope"></span>	
			<?php  } else {  ?>
						<button class="btn btn-default btn-lg dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-align-justify"></span>
			<?php  } ?>
					    Menu 
					  </button>
					  <ul class="dropdown-menu" role="menu">
					    <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?page=home&section=myprofile"><span class="glyphicon glyphicon-user"></span><?php echo _(' My Profile '); ?></a></li>
			
			<?php   if ($new_messages_nb > 0) { ?>
					    <li role="presentation" class="active success clic-messages"><a role="menuitem" tabindex="-1" href="index.php?page=home&section=mymessages" ><span class="badge"><?= $new_messages_nb ?></span><span class="glyphicon glyphicon-envelope" ></span> <?= _(' My Messages '); ?></a></li>
			<?php  } else { ?>
					   <li role="presentation" class="clic-messages"><a role="menuitem" tabindex="-1" href="index.php?page=home&section=mymessages"><span class="glyphicon glyphicon-envelope"></span>'<?= _(' My Messages '); ?></a></li>
			<?php  }  ?>
					    <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?page=home&section=userslist"><span class="glyphicon glyphicon-globe"></span><?php echo _(' People '); ?></a></li>
					 	<li role="presentation"><a role="menuitem" tabindex="-1" href="view/chat.php" onclick="setStatus('En ligne')"><span class="glyphicon glyphicon-comment"></span><?php echo _(' Chatting Room '); ?></a></li>
					  </ul>
					</div>
				</div>


				  <div class="col-md-9">
				  <?php if(isset($_GET['section'])) 
						{
							$section = htmlspecialchars($_GET['section']);
							
							if(!file_exists('view/'.$section.'.php')){
								$section = '404';
							}
						}
						else 
						{
							$section = 'userslist';
						}
						include ($section.'.php');
					     ?>
				  </div>
			</div>
			


			
			<?php } else { ?>

			

				<div class="jumbotron deconnected">
						<p> 
                        
                        <H2> <?php echo _(' Welcome to our supervised project. This project is a multicultural meeting Website. Its purpose is to link together :'); ?> </H2>
							<br/>
							<li><?php echo _('People with different nationalities to allow cultural and linguistic exchanges.'); ?></li>
							<li><?php echo _('People with a common nationality for expatriates who miss their countries ! '); ?></li>
							<br/>
							<?php echo _('We are three students in informatics (Bachelor), and we are beginners in Web programming.'); ?>
							<br/>
							<?php echo _('This project is an opportunity for us to learn  and  apply directly languages we are working on during courses. '); ?>
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
			
			<?php } 
