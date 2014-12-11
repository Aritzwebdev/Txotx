<?php
	$izena=$_GET['izena'];
	$herria=$_GET['herria'];

	$con=mysqli_connect("localhost", "root", "zubiri","txotx");

	if(!mysqli_select_db($con, "txotx")){
		echo "Error seleccion base de datos";
		exit;
	}

	$sql="SELECT lat, lng FROM sagardotegiak WHERE izena='".$izena."';";
	$result=mysqli_query($con, $sql);

	while($row=mysqli_fetch_array($result)){
		$lat=$row['lat'];
		$lng=$row['lng'];
	}
?>
<html>
<head>
	<link rel="stylesheet" href="sagardotegia.css"/>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCSSM7-xksXzaoxuMpicqx0Df6cUOsblbY"></script>
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
	</script>
</head>
<body onload="initialize();">
<header id="registro">
	<ul id="hizkuntzak">
		<li><a href="">eu</a></li>
		<li>|</li>
		<li><a href="">es</a></li>
	</ul>
	<ul id="top_header">
		<li><a href="">Sagardotegiak</a></li>
		<li><a href="index.html">Hasiera</a></li>
	</ul>
</header>
<div id="menu_txikia">
	<form action="bilatu.php" method="get">
		<input id="menu_txiki_herria" type="submit" name="herria" value="<?php echo $herria;?>">
		<a id="menu_txiki_izena"><?php echo ">".$izena ?></a>
	</form>
</div>
<div id="izena">
	<h1><?php echo $izena ;?></h1>
</div>
<?php
	
	/*$con = mysqli_connect(getenv('OPENSHIFT_MYSQL_DB_HOST'), getenv('OPENSHIFT_MYSQL_DB_USERNAME'), getenv('OPENSHIFT_MYSQL_DB_PASSWORD'), "", getenv('OPENSHIFT_MYSQL_DB_PORT')) or die("Error: " . mysqli_error($con));*/

	if(!$con){
		echo "Conexion fallida";
		exit;
	}

	/*mysqli_select_db($con, getenv('OPENSHIFT_APP_NAME')) or die("Error: " . mysqli_error($con));*/

	

	$sql="SELECT deskribapena, telefonoa, email, web FROM sagardotegiak WHERE izena='".$izena."';";
	$result=mysqli_query($con, $sql);

	if(!$result){
		echo "Error resultado";
		exit;
	}

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
		
		<div id="googleMap" style="width: 640px; height: 400px;"></div>
<?php
	}	
?>	
	<div id="iruzkin">
		<div id="iruzkin_header">
			<h3>Iruzkinak</h3>
		</div>
		<div id="iruzkinak">
			<?php
				/*$con=mysql_connect("localhost", "root", "zubiri");

				if(!$con){
					echo "Conexion fallida";
					exit;
				}

				if(!mysql_select_db("txotx", $con)){
					echo "Error seleccion base de datos";
					exit;
				}*/
				$sql="SELECT erabiltzailea, data, iruzkina FROM iruzkinak WHERE sagardotegia='".$izena."';";
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
			<form action="validar.php" method="get">
				<label id="okerra" color="red"></label>
				Erabiltzailea: <input type="text" name="erabiltzailea">
				<br>
				Pasahitza: <input type="password" name="pasahitza">
				<br>
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
</html>
