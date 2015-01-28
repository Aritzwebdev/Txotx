<?php
	session_start();

	$herria= $_SESSION["Herria"];
?>
<!DOCTYPE HTML>
<html>
<head>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script> 
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCSSM7-xksXzaoxuMpicqx0Df6cUOsblbY"></script>
	<!-- bxSlider Javascript file -->
	<script src="js/jquery.bxslider.min.js"></script>
	<!-- bxSlider CSS file -->
	<link href="css/jquery.bxslider.css" rel="stylesheet" />
	<link rel="stylesheet" href="css/bilatu.css"/>

	<link rel="stylesheet" href="css/perfil.css"/>
</head>
<body>
<div class="foo">
<header id="registro">

	<ul id="top_header">
		<li><a href="index.php" id="hasiera" >Hasiera</a></li>
		<li><a href="#" id="argazkiak" onclick="argazkiak();"> Argazkiak </a></li>
		<li><a href="#" id="mapa" onclick="mapa();"> Mapa </a></li>
	</ul>
	<ul id="hizkuntzak">
		<li><a href="">eu</a></li>
		<li>|</li>
		<li><a href="">es</a></li>
	</ul>

</header>

<div id="menu_txikia">
	<form action="index.php" method="post">
		<input id="bilatu" type="submit" name="herria" value="Bilatzailea" />
	</form>
</div>
	<div id="header">
		<img id="logo" src="img/logo.png"/>
		<h1><p id="probin"><?php echo $herria ?></p></h1>
		<form action="bilatu.php" method="GET">
			<input type="search" name="herria" placeholder="Bilatu..." />
		</form>
</div>
	<div>

        <!-- Contenido -->
        <section>
            
        <div id="taulaHerriak">
			<table class="table" id="tablajson">
				<thead>
					<th>Sagardotegiak</th>			
				</thead>
				<tbody class="taula"></tbody>
			</table>
		<div>
			<script type="text/javascript">

			$(document).ready(function(){
				var url="listaSidrerias.php";
				$("#tablajson tbody").html("");
				
				$.getJSON(url,function(sidrerias){
					$.each(sidrerias, function(i,sidreria){
						var newRow =
						"<tr value='"+sidreria.Sagardotegia+"' class='tr'>"
						+"<td>"+ parseInt(i+1) +"<td><a href='#'>"+sidreria.Sagardotegia+"</a></td>"
						+"</tr>";
						$(newRow).appendTo("#tablajson tbody");
					});
				});
			});

			</script>
 
        </section>
	</div>
</div>
</body>
<script type="text/javascript">
		$(".table").on('click','.tr',function(e){
			e.preventDefault();
			var sagardotegia=$(this).attr('value');

			location.href="zerrendaSagardo.php?Sagardotegia="+sagardotegia;
		});
</script>

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