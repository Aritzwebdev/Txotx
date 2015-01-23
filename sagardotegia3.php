<?php
	session_start();

	$sagardotegia=$_GET['sagardotegia'];

	include 'conectar.php';
	$con=conectar();
	

	$sql="SELECT lat, lng, herria FROM sagardotegiak WHERE izena='".$sagardotegia."';";
	$result=mysqli_query($con, $sql);

	while($row=mysqli_fetch_array($result)){
		$lat=$row['lat'];
		$lng=$row['lng'];
		$herriaznb=$row['herria'];
	}
	$sql="SELECT izena FROM herriak WHERE idherriak='".$herriaznb."';";
	$result=mysqli_query($con, $sql);

	if($row=mysqli_fetch_array($result)){$herria=$row['izena'];}
?>
<html>
<head>
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script> 
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCSSM7-xksXzaoxuMpicqx0Df6cUOsblbY"></script>
	<!-- bxSlider Javascript file -->
	<script src="js/jquery.bxslider.min.js"></script>
	<!-- bxSlider CSS file -->
	<link href="css/jquery.bxslider.css" rel="stylesheet" />
	<link rel="stylesheet" href="css/sagardotegia.css"/>


	<script>
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
		google.maps.event.addDomListener(window, 'load', initialize());
	</script>
	<script type="text/javascript">
		function iruzkinak(id){
			var e = document.getElementById(id);
			if(e.style.display == 'block')
				e.style.display = 'none';
			else
				e.style.display = 'block';
		}

		function argazkiak(){
			var m = document.getElementById("googleMap");
			var a = document.getElementById("slider");
			
				m.style.display = 'none';
				a.style.display = 'block';
			
		}

		function mapa(){
			var m = document.getElementById("googleMap");
			var a = document.getElementById("slider");
			
				a.style.display = 'none';
				m.style.display = 'block';
			
		}
	</script>
</head>
<body onload="initialize();">

<header id="registro">

	<ul id="top_header">
		<li><a href="index.php">Hasiera</a></li>
		<li><a href="#">Sagardotegiak</a></li>
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
	<form action="bilatu.php" method="get">
		<input id="menu_txiki_herria" type="submit" name="herria" value="<?php echo $herria;?>">
		<!--<a id="menu_txiki_izena"><?php echo ">".$sagardotegia ?></a>-->
	</form>
</div>
<div id="izena">
	<h1><?php echo $sagardotegia; ?></h1>
</div>

<?php
	$sql="SELECT deskribapena, telefonoa, email, web FROM sagardotegiak WHERE izena='".$sagardotegia."';";
	$result=mysqli_query($con, $sql);

	while($row=mysqli_fetch_array($result)){
?>
		<div id="deskribapena">
			<?php
				echo "<br>";
				echo $row['deskribapena']."<br>";
				echo "Telefonoa: ".$row['telefonoa']."<br>";
				if($row['email']!=""){
					echo "Email: ".$row['email']."<br>";
				}
				if($row['web']!=""){
					echo "Web: ".$row['web']."<br>";
				} 
				echo "Latitud: ".$lat."<br>";
				echo "Longitud: ".$lng."<br>";
			?>
			<a id="comentarios" href="#" onClick="iruzkinak('iruzkin')">Iruzkinak ikusi</a>
		</div>
		
		<!-- GOOGLE MAPS -->
		<div id="googleMap" style="width: 640px; height: 400px;"></div>
		
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
					<?php echo $row['erabiltzailea']."    ".$row['data'];?>
				</div>
				<div id="iruzkina">
					<?php echo $row['iruzkina']."<br><br>";?>
				</div>
			<?php	
				}
			?>
		</div>
		
		<div>
			<form action="guardarComentario.php" method="get">
				<label id="okerra" color="red"></label>
				<?php if(!isset($_SESSION["user"])){ ?>
				Erabiltzailea: <input type="text" name="erabiltzailea">
				<br>
				Pasahitza: <input type="password" name="pasahitza">
				<br>
				<?php } ?>
				Iruzkina:<br><textarea name="iruzkina" rows="5" ></textarea>
				<br>
				<input type="hidden" name="izena" value="<?php echo $izena; ?>">
				<input type="hidden" name="herria" value="<?php echo $herria; ?>">
				<input type="hidden" name="data" 
				value="<?php echo date('Y-m-d H:i:s'); ?>">
				<input type="submit" value="Bidali" > 
			</form>
		</div>
		
	</div><!--iruzkinak div-->
<?php 
	if (isset($_GET['msg'])){
?>
	<script type="text/javascript">
		var e=document.getElementById(okerra);
		e.text("Erabiltzaile edo pasahitz okerra");
		//alert("Erabiltzaile edo pasahitz okerra");
	</script>

<?php
	}
	else{
?>
		<script type="text/javascript">
		var e=document.getElementById(okerra);
		e.text("");
		//alert("Erabiltzaile edo pasahitz okerra");
	</script>
<?php
	}
	mysqli_close($con);
?>

</body>

<script type="text/javascript">
	
	$(document).ready(function(){
	  $('.bxslider').bxSlider();
	});

</script>

</html>