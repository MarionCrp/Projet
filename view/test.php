<p style="color:white;">

<?php
// foreach (array_combine($_POST['languages_id'], $_POST['levels_id']) as $languageid => $levelid) {
// 	if($languageid != null){
// 	$spoken_language_manager->modifyLanguage($current_user->id(), $languageid, $levelid);
// 				}
// 			}

	var_dump($langue1 = new SpokenLanguage(array(
		'userId' => 1,
		'languageId' => 5,
		'levelId' => 4
		)));

	var_dump($langue2 = new SpokenLanguage(array(
		'userId' => 1,
		'languageId' => 5,
		'levelId' => 4
		)));

	var_dump($langue1 == $langue2);

 		?>	</p>