<?php
	session_start();

	$herria= $_SESSION["Herria"];

	include "conectar.php";
	$con=conectar();

	$sql="SELECT probintzia FROM herriak WHERE izena='".$herria."';";
	$result=mysqli_query($con, $sql);

	if($row=mysqli_fetch_array($result)){
		$probintziaid=$row['probintzia'];
		$_SESSION['probintzia']=$probintziaid;
	}
	$sql="SELECT izena FROM probintzia WHERE idprobintzia='".$probintziaid."';";
	$result=mysqli_query($con, $sql);

	if($row=mysqli_fetch_array($result)){
		$probintzia=$row['izena'];
	}
?>
<!DOCTYPE HTML>
<html>
<head>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script> 
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCSSM7-xksXzaoxuMpicqx0Df6cUOsblbY"></script>
	<!-- bxSlider Javascript file -->
	<script src="js/jquery.bxslider.min.js"></script>
	<script src="js/herria.js"></script>
	<!-- bxSlider CSS file -->
	<link href="css/jquery.bxslider.css" rel="stylesheet" />

	<link rel="stylesheet" href="css/perfil.css"/>
	<link rel="stylesheet" href="css/bilatu.css"/>

	<title>Sagardotegida.tk/Sagardotegiak</title>
</head>
<body>
	<div class="foo">

		<img id="logo" src="img/logo.png" />
	 	<h1 id="titulo">SagardoteGida</h1>

	<header id="registro">

		<ul id="top_header">
			<li><a href="index.php" id="hasiera" ><img src="img/inicio.png" class="imgMenu" />Hasiera</a></li>
		</ul>
		<ul id="hizkuntzak">
			<li><a href="">eu</a></li>
			<li>|</li>
			<li><a href="">es</a></li>
		</ul>

	</header>

	<div id="menu_txikia">
			<a id="bilatu" href="bilatu.php"><?php echo $probintzia;?> </a>
	</div>
	
	<div id="header">
		<img id="log" src="img/logo.png"/>
		<h1><p id="probin"><?php echo $herria ?></p></h1>
		<form action="bilatu.php" method="GET" id="bil">
			<input type="search" name="herria" placeholder="Bilatu..." />
		</form>
	</div>
		
		<div>

	        <!-- Contenido -->
	        <section>
	            
	        <div id="sagardo"> Sagardotegiak </div>

	        <div id="taulaHerriak">
				<table class="table" id="tablajson">
					<tbody class="taula"></tbody>
				</table>
			<div>
				
	 
	        </section>
		</div>
	</div>
</body>
	<script src="js/jquery.js"></script>
	<script src="js/jquery.backstretch.js"></script>
	
<script type="text/javascript">
		$.backstretch([
	          "img/txotx.jpg",
	          "img/slide.jpg",
	          "img/sidra.jpg"
	        ], {
	            fade: 750,
	            duration: 4000
	        });
</script>
</html>