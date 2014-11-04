<?php
	$erabiltzailea=$_GET['erabiltzailea'];
	$pasahitza=$_GET['pasahitza'];
	$iruzkina=$_GET['iruzkina'];
	$data=$_GET['data'];
	$sagardotegia=$_GET['izena'];
	$herria=$_GET['herria'];

	$con=mysql_connect("localhost", "root", "zubiri");

	if(!$con){
		echo "Conexion fallida";
		exit;
	}

	if(!mysql_select_db("txotx", $con)){
		echo "Error seleccion base de datos";
		exit;
	}

	$sql="SELECT erabiltzailea, pasahitza FROM erabiltzaileak 
		WHERE erabiltzailea='".$erabiltzailea."';";
	$result=mysql_query($sql, $con);
	$row=mysql_fetch_array($result);

	if($row['erabiltzailea']==$erabiltzailea&&$row['pasahitza']==$pasahitza){
		header("Location: gorde.php?iruzkina=$iruzkina&erabiltzailea=$erabiltzailea&data=$data&sagardotegia=$sagardotegia&herria=$herria");
	}
	else{
		header ("Location: sagardotegia.php?msg=error&izena=$sagardotegia&herria=$herria"); 
  		exit;
	}
?>