<?php
	session_start();

	$probintzia= $_SESSION["probintzia"];
?>
<!DOCTYPE HTML>
<html>
<head>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script> 
	<!-- bxSlider Javascript file -->
	<script src="js/jquery.bxslider.min.js"></script>
	<script src="js/bilatu.js"></script>
	<!-- bxSlider CSS file -->
	<link href="css/jquery.bxslider.css" rel="stylesheet" />
	

	<link rel="stylesheet" href="css/perfil.css"/>
	<link rel="stylesheet" href="css/bilatu.css"/>

	<title>Sagardotegida.tk/Herriak</title>
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
				<a id="bilatu" href="index.php">Bilatzailea</a>
		</div>
			<div id="header">
				<img id="log" src="img/logo.png"/>
				<h1 id="probin"><?php 
					if($probintzia == 1){
						echo "Gipuzkoa";
					}else if($probintzia == 2){
						echo "Bizkaia";
					}else if($probintzia == 4){
						echo "Araba";
					}else if($probintzia == 3){
						echo "Nafarroa";
					}else if($probintzia == 5){
						echo "Iparralde";
					}
				?></h1>
				<form action="bilatu.php" method="GET" id="bil">
					<input type="search" name="herria" placeholder="Bilatu..." />
				</form>
		</div>

		<div id="herri"> Herriak</div>
			
			<div>
		        <!-- Contenido -->
		        <section>
		     
		     <?php 
					if($probintzia == 1){
			?>

		        <div id="taulaHerriak">
					<table class="table" id="tablajson">
						<tbody class="taula1"></tbody>
					</table>
				<div>

				<div id="taulaHerriak2">
					<table class="table" id="tablajson">
						<tbody class="taula2"></tbody>
					</table>
				<div>

				<div id="taulaHerriak3">
					<table class="table" id="tablajson">
						<tbody class="taula3"></tbody>
					</table>
				<div>

				<div id="taulaHerriak4">
					<table class="table" id="tablajson">
						<tbody class="taula4"></tbody>
					</table>
				<div>

				<div id="taulaHerriak5">
					<table class="table" id="tablajson">
						<tbody class="taula5"></tbody>
					</table>
				<div>
			<?php }else{ ?>

				<div id="taulaHerriak">
					<table class="table" id="tablajson">
						<tbody class="taula1"></tbody>
					</table>
				<div>
			<?php } ?>		 
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
