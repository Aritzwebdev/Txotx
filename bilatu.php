<?php
	session_start();

	$probintzia= $_SESSION["probintzia"];
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
	

	<link rel="stylesheet" href="css/perfil.css"/>
	<link rel="stylesheet" href="css/bilatu.css"/>
	

	<script type="text/javascript">
		$(document).ready(function(){
			$('#izena').click(function(){
				$('bilatu.php',{'#izena':$(this).text()},function(data){
					$('#sagartotegia').load (sagardotegia.php);
				});
				return false;
			});

		}) ;

		function logout(){
                location.href="logout.php";
        }

        function perfil(user){
            if(user=="Admin"){
                location.href="admin.php";
            }else{
                location.href="perfil.php";
            }
        }
	</script>
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
			<?php 
                if (isset($_SESSION["user"])){ 
                ?>
			<ul id="top_headerDer">
				<li><a id="itxi" href="#" onclick="logout();"><img src="img/logout.png" class="imgMenu" />Saioa itxi</a></li>
				<li>
                    <img src="img/usuario.png" class="imgMenu" /><a id="user" href="#" onclick="perfil('<?php echo $_SESSION["user"]; ?>');">Kaixo, <ins><?php echo $_SESSION["user"]; ?></ins></a>
                </li>
			</ul>
			<?php } ?>

		</header>

		<div id="menu_txikia">
			<form action="index.php" method="post">
				<input id="bilatu" type="submit" name="herria" value="Bilatzailea" />
			</form>
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
			<div>

		        <!-- Contenido -->
		        <section>
		            
		        <div id="taulaHerriak">
					<table class="table" id="tablajson">
						<thead>
							<th></th>
							<th class="thHerriak">Herriak</th>			
						</thead>
						<tbody class="taula"></tbody>
					</table>
				<div>
					<script type="text/javascript">

					$(document).ready(function(){
						var url="listaPueblos.php";
						$("#tablajson tbody").html("");
						
						$.getJSON(url,function(pueblos){
							$.each(pueblos, function(i,pueblo){
								var newRow =
								"<tr value='"+pueblo.Herria+"' class='tr'>"
								+"<td>"+ parseInt(i+1) +"<td><a href='#'>"+pueblo.Herria+"</a></td>"
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
			var herria=$(this).attr('value');

			location.href="zerrendaHerria.php?Herria="+herria;
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
