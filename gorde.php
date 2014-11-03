<?php
	$iruzkina=$_POST['iruzkina'];
	$erabiltzailea=$_POST['erabiltzailea'];
	$data=$_POST['data'];
	$sagardotegia=$_POST['izena'];
	$herria=$_POST['herria'];

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

	header("Location: sagardotegia.php");
	die();
	
?>