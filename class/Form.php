<?php
class Form
{
	/**
	* Valide si l'email entré par l'utilisateur est une adresse valide
	* @param string $email entré par l'utilisateur
	* @return bool (1 - Email Valide) / ( 0 - Email Non Valide) 
	**/
	public static function validEmail($email)
	{
		if(!preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $email))
		{
			return 0;
		}
		else 
			return 1;
	}

	/**
	* Valide si les deux mots de passes entré par l'utilisateur sont identiques
	* @param string $password 1er mot de passe
	* @param string $confirmed_pw confirmation du mot de passe
	* @return bool (1 - mdp identiques) / ( 0 - mdp différent) 
	**/
	public static function validPassword($password, $confirmed_pw) {
		if($password != $confirmed_pw)
		{
			echo '<p style="color:red;">' ._(' Passwords are different '). '</p>';
			return 0;
		}
		else {
			return 1;
		}
	}

	/**
	* Création du formulaire jour
	**/
	public static function day()
	{
		for ($i = 1; $i <= 31; $i++)
		{
			echo '<option value="' .$i.'">' .$i. '</option>';
		}
	}

	/**
	* Création du formulaire année
	**/
	public static function year()
	{
		for ($i = 1950; $i < date("Y"); $i++)
		{
			echo '<option value="' .$i.'">' .$i. '</option>';
		}
	}

	/**
	* Affiche une liste de tous les languages de la base de donnée.
	* Selectionne par défaut une langue utilisée si elle est passée en paramètre
	* @param LanguageManager $lang_manager
	* @param int $spoken_language_id
	*
	*/
	public static function languages(LanguageManager $lang_manager, $spoken_language_id = null){
		$languages = $lang_manager->getLanguages();
		echo '<option value=""> Choose a Language </option>';
		foreach ($languages as $language){
			if ($language->id() == $spoken_language_id) $selected = 'selected';
			else $selected = '';
			echo '<option value="'.$language->id().'" '.$selected.'>'.$language->name().'</option>';
		}
	}


	public static function nationality_form(PDO $db, $nationalityId = -1){
		$country_manager = new CountryManager($db);
		$countries= $country_manager->getCountries();
		foreach ($countries as $country) {
			if ($country->id() == $nationalityId) {
				echo '<option countryid='.$country->id().'" value="'.$country->id().'" selected="'.$nationalityId.'">'.$country->name().'</option>';
			}
			echo '<option countryid='.$country->id().'" value="'.$country->id().'">'.$country->name().'</option>';
		}
	}

	public static function level_form(Level $level){
		switch($level->id()){
			case 1:
				$level_field = 'info' ;
				break;
			case 2:
				$level_field = 'success';
				break;
			case 3:
				$level_field = 'warning';
				break;
			case 4:
				$level_field = 'danger';
				break;
			case 5:
				$level_field = 'primary';
				break;
		}

		echo '<div class="progress">
			   <div class="progress-bar progress-bar-'.$level_field.'" role="progressbar" aria-valuenow="'.$level->id().'" aria-valuemin="0" aria-valuemax="5" style="width: '.($level->id()*20).'%;">
              '.$level->name().'</div>
          </div>';
	}

	public static function getGenderIcon(User $user){
		if($user->gender() == 'male'){
			return 'male';
		} else {
			return 'female';
		}
	}

	public static function getPagination($totalItems, $perPage, $url, $page = 1){
		$nb_of_pages = $totalItems / $perPage;
		if($page > 1){
			?>
			<li>
	      		<a href="#" aria-label="Previous">
	       		 <span aria-hidden="true">&laquo;</span>
	    	    </a>
	    	</li>
	<?php
	}
		if($nb_of_pages <= 5) {
				while ($page <= $nb_of_pages){
					//echo '<li><a href="'.$url.''.$page.'">'.$page.'</a></li>';
					echo '<li><a href="'.$url.''.$page.'">'.$page.'</a></li>';
					$page++;
				}
		}
		if ($page < $nb_of_pages){
		?>
		  <a href="#" aria-label="Next">
	        <span aria-hidden="true">&raquo;</span>
	      </a>
		<?php
			
		}
		

		
	}
}

