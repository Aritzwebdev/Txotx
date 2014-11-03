<?php
	$iruzkina=$_GET['iruzkina'];
	$erabiltzailea=$_GET['erabiltzailea'];
	$data=$_GET['data'];
	$sagardotegia=$_GET['izena'];
	$herria=$_GET['herria'];

	echo $iruzkina;
	echo $erabiltzailea;
	echo $data;
	echo $sagardotegia;

	$con=mysql_connect("localhost", "root", "zubiri");

	if(!$con){
		echo "Conexion fallida";
		exit;
	}

	if(!mysql_select_db("txotx", $con)){
		echo "Error seleccion base de datos";
		exit;
	}
	$sql="INSERT INTO iruzkinak (erabiltzailea, data, iruzkina,
		sagardotegia) VALUES ('$erabiltzailea', '$data', '$iruzkina', 
		'$sagardotegia');";
	$result=mysql_query($sql, $con);

	/*if(!$result){
		echo "Error resultado";
		exit;
	}*/

	header("Location: sagardotegia.php?izena=$sagardotegia&herria=$herria");
	die();
?>