<?php 

include_once('autoload.php');

?>

<!DOCTYPE html>
<html>
<head>
	<!-- <meta charset="ISO-8859-1">  -->
	<meta charset="utf-8"/>
	<meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />

	<link rel="stylesheet" href="assets/css/css/bootstrap.css"/>
		<link rel="stylesheet" href="assets/css/css/style.css"/>
	<title>World & I </title>
</head>

	<body>

<div class="container-fluid">
  <div class="row">
  <div class="col-md-1"><img src="assets/images/logo.png" /></div>
  <div class="col-md-10"></div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1"><img src="assets/images/spain_flag.png" /></div>
  </div>
</div>

	<div class="page-header">
	<h1 style="text-align: center;"> CityWorld </h1>
	</div>

	<div class="jumbotron">
		<div class="container">
			<?php


			if(isset($_GET['page'])) 
			{
				$page = $_GET['page'];
			}

			else 
			{
				$page = 'home';
			}

			include ('view/'.$page.'.php');

			?>
		</div>
	</div>

	
	</body>


</html>