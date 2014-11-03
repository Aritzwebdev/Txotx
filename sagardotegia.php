<html>
<head>
	<link rel="stylesheet" href="sagardotegia.css"/>
</head>
<body>
<?php
	$izena=$_GET['izena'];
	$herria=$_GET['herria'];
?>
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
	$con=mysql_connect("localhost", "root", "zubiri");

	if(!$con){
		echo "Conexion fallida";
		exit;
	}

	if(!mysql_select_db("txotx", $con)){
		echo "Error seleccion base de datos";
		exit;
	}
	$sql="SELECT deskribapena, telefonoa, email, web FROM sagardotegiak WHERE izena='".$izena."';";
	$result=mysql_query($sql, $con);

	if(!$result){
		echo "Error resultado";
		exit;
	}

	while($row=mysql_fetch_array($result)){
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
			?>
		</div>
<?php
	}	
?>	
	<div id="iruzkin_header">
		<h3>Iruzkinak</h3>
	</div>
	<div id="iruzkinak">
		<?php
			$con=mysql_connect("localhost", "root", "zubiri");

			if(!$con){
				echo "Conexion fallida";
				exit;
			}

			if(!mysql_select_db("txotx", $con)){
				echo "Error seleccion base de datos";
				exit;
			}
			$sql="SELECT erabiltzailea, data, iruzkina FROM iruzkinak WHERE sagardotegia='".$izena."';";
			$result=mysql_query($sql, $con);

			if(!$result){
				echo "Error resultado";
				exit;
			}
			while($row=mysql_fetch_array($result)){
			?>
			<div id="nork">
				<?php echo $row['erabiltzailea']."    ".$row['data']."<br>";?>
			</div>
			<div id="iruzkina">
				<?php echo $row['iruzkina']."<br><br>";?>
			</div>
		<?php	
			}
		?>
	</div>
	<div>
		<form action="gorde.php" method="get">
			Erabiltzailea: <input type="text" name="erabiltzailea">
			<br>
			Iruzkina:<br><textarea name="iruzkina" rows="5" ></textarea>
			<br>
			<input type="hidden" name="izena" value="<?php echo $izena; ?>">
			<input type="hidden" name="herria" value="<?php echo $herria; ?>">
			<input type="hidden" name="data" value="<?php echo date('Y-m-d H:m:s'); ?>">
			<input type="submit" value="Bidali" > 
		</form>
	</div>
</body>
</html>