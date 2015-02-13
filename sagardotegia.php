<?php
session_start();

$sagardotegia=$_SESSION['Sagardotegia'];


	include "conectar.php";
	$con=conectar();

	$sql="SELECT lat, lng, herria FROM sagardotegiak WHERE izena='".$sagardotegia."';";
	$result=mysqli_query($con, $sql);

	if($row=mysqli_fetch_array($result)){
		$lat=$row['lat'];
		$lng=$row['lng'];
		$herriaznb=$row['herria'];
	}
	$sql="SELECT izena FROM herriak WHERE idherriak='".$herriaznb."';";
	$result=mysqli_query($con, $sql);

	if($row=mysqli_fetch_array($result)){
		$herria=$row['izena'];
		$_SESSION['Herria']=$herria;
	}
?>
<html>
<head>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script> 
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCSSM7-xksXzaoxuMpicqx0Df6cUOsblbY"></script>
	
	<script type="text/javascript" src="js/sagardotegia.js"></script>
	<script type="text/javascript" src="js/menuAdmin.js"></script>

	<!-- bxSlider Javascript file -->
	<script src="js/jquery.bxslider.min.js"></script>
	
	<!-- bxSlider CSS file -->
	<link href="css/jquery.bxslider.css" rel="stylesheet" />

	<link rel="stylesheet" href="css/menuSagardotegia.css"/>
	<link rel="stylesheet" href="css/perfil.css"/>
	<link rel="stylesheet" href="css/sagardotegia.css"/>
	
	<script type="text/javascript">
		
		function initialize() {
            var lat="<?php echo $lat; ?>";
            var lng="<?php echo $lng; ?>";

            var mapProp = {
              //center:new google.maps.LatLng(43.2963,-1.8727),
              center:new google.maps.LatLng(lat,lng),
              zoom:16,
              mapTypeId:google.maps.MapTypeId.ROADMAP
            };
            var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
            var marker=new google.maps.Marker({
                position:new google.maps.LatLng(lat,lng)
                //position:new google.maps.LatLng(43.2963,-1.8727)
            });

            marker.setMap(map);

            var m = document.getElementById("googleMap");
            var a = document.getElementById("slider");
            
                a.style.display = 'none';
                m.style.display = 'block';
        }	
	</script>

	<title>Sagardotegida.tk/Sagardotegia</title>
</head>

<body>

<div class="foo">

	<img id="logo" src="img/logo.png" />
	<h1 id="titulo">SagardoteGida</h1>
	<div id="hizkuntzak">
        <li><a href="index.php">eu</a></li>
        <li>|</li>
        <li><a href="index_esp.php">es</a></li>
    </div>

	<header id="registro">
   	
   	<div class="container"> 	
	    <div id='cssmenu' class="align-center">
			<ul>
	          	<li><a href="index.php"><img src="img/inicio.png"/ id="ini">Hasiera</a></li>
	           	<li><a href="#" id="argazkiak" ><img src="img/fotos.png"/> Argazkiak </a></li>
				<li><a href="#" id="mapa" ><img src="img/mapa.png"/> Mapa </a></li>
				<?php 
					if (isset($_SESSION["user"])){ 
				?>		
					<li><a id="user" href="#" ><img src="img/usuario.png"/> Kaixo,<?php echo $_SESSION["user"]; ?></a></li>
					<li><a id="itxi" href="#" ><img src="img/logout.png"/>Saioa itxi</a></li>		
				<?php }else{ ?>				
					<li><a id="iriki" href="#" onclick="autoLog('login');" ><img src="img/login.png"/>Saioa hasi</a></li>			
				<?php } ?>
			</ul>	 
		</div>
	</div>

    </header>
    
	<div id="menu_txikia">
		<form action="herria.php" method="get">
			<input id="menu_txiki_herria" type="submit" name="herria" value="<?php echo $herria;?>">
		</form>
	</div>

	<div id="header">
		<img id="log" src="img/logo.png"/>
		<h1 id="userPerfil"><?php echo $sagardotegia; ?> sagardotegia</h1>
	</div>

	<div id="login">              
	    <form class="form-4" action="" method="post"> 
	                  
	    	<label for="erabiltzailea" style="padding: 10px 0px 2px 0px;"><font color="white">Erabiltzailea</font></label>
	        <input type="text" name="erabiltzaileaLog" id="erabiltzaileaLog" title="Sartu erabiltzaile izena" />
	                    
	                    
	        <label for="pasahitza" style="padding: 15px 0px 2px 0px;"><font color="white">Pasahitza</font></label>
	        <input type="password" name="pasahitzaLog" id="pasahitzaLog" title="Sartu pasahitza" />
	                   
	        <font color="red"><div id="aviso"></div></font></br>
	                    
	        <input type="button" value="Sartu" id="butsartu" />
	    </form>
	</div>

	<?php
		$sql="SELECT deskribapena, telefonoa, email, web FROM sagardotegiak WHERE izena='".$sagardotegia."';";
		$result=mysqli_query($con, $sql);

		while($row=mysqli_fetch_array($result)){
	?>
			<div id="deskribapena">
				<?php
					echo "<br>";
					echo "<strong><i> Helbidea: </i></strong>". $row['deskribapena']."<br>";
					echo "<strong><i> Telefonoa: </i></strong>".$row['telefonoa']."<br>";
					if($row['email']!=""){
						echo "<strong><i>Email: </i></strong>".$row['email']."<br>";
					}
					if($row['web']!=""){
						echo "<strong><i>Web: </i></strong><a href='".$row['web']."'>".$row['web']."</a><br>";
					} 
				?>
				<a id="comentarios" href="#" ><u>Iruzkinak ikusi</u></a>
			</div>
			
			<!-- GOOGLE MAPS -->
			<div id="googleMap"></div>
			
			<!-- SLIDER -->
			<div id="slider"> 

				<ul class="bxslider">
				  <li><img src="img/sidra.jpg" /></li>
				  <li><img src="img/slide.jpg" /></li>
				  <li><img src="img/txotx2.jpg" /></li>
				  <li><img src="img/sag-usurbilsaizar01.jpg" /></li>
				</ul>

			</div>
	<?php
		}	
	?>	
	<div id="iruzkin">
		<div id="iruzkin_header">
			<h3>Iruzkinak</h3>
		</div>
		<div id="iruzkinak">
			<?php

				$sql="SELECT erabiltzailea, data, iruzkina FROM iruzkinak WHERE sagardotegia='".$sagardotegia."';";
				$result=mysqli_query($con, $sql);

				if(!$result){
					echo "Error resultado";
					exit;
				}
				while($row=mysqli_fetch_array($result)){
				?>
				<div id="nork">
					<?php echo "<strong><i>".$row['erabiltzailea']."</i></strong>    ".$row['data'];?>
				</div>
				<div id="iruzkina">
					<?php echo $row['iruzkina']."<br><br>";?>
				</div>
			<?php	
				}
			?>
		</div>
	</div><!--iruzkinak div-->
	<?php if(isset($_SESSION["user"])){ ?>
		<div id="iruzkinSartu">
			<form action="" method="post">
				<font color="red" ><label id="okerra"></label></font>
				Iruzkina:<br><textarea id="text_iruzkina" name="text_iruzkina" rows="5" ></textarea>
				</br>
				<input type="button" id="btnbidali" value="Bidali" >
						 
			</form>
		</div>
		<?php } ?>
</div>

</body>

<script type="text/javascript">		
		  $('.bxslider').bxSlider();
</script>

	<script src="js/jquery.js"></script>
	<script src="js/jquery.backstretch.js"></script>

</html>