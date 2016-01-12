<?php 

include_once('autoload.php');

?>

<!DOCTYPE html>
<html>
<head>
	<!-- <meta charset="ISO-8859-1">  -->
	<meta charset="utf-8"/>
	<meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" href="css/css/bootstrap.css"/>
	<link rel="stylesheet" href="css/css/style.css"/>
	<title>World & I </title>
</head>

	<body>

	<header>
	<h1 style="text-align: center;"> CityWorld </h1>
	</header>

	<?php


	if(isset($_GET['page'])) 
	{
		$page = $_GET['page'];
	}

	else 
	{
		$page = 'home';
	}

	include ($page.'.php');

	?>

	</body>


</html>