<?php
	$erabiltzailea=$_GET['erabiltzailea'];
	$pasahitza=$_GET['pasahitza'];
	$iruzkina=$_GET['iruzkina'];
	$data=$_GET['data'];
	$sagardotegia=$_GET['izena'];
	$herria=$_GET['herria'];

	include 'conectar.php';
	$con=conectar();

	$sql="SELECT erabiltzailea, pasahitza FROM erabiltzaileak 
		WHERE erabiltzailea='".$erabiltzailea."';";
	$result=mysqli_query($con, $sql);
	$row=mysqli_fetch_array($result);

	if($row['erabiltzailea']==$erabiltzailea&&$row['pasahitza']==$pasahitza){
		
		$sql="INSERT INTO iruzkinak (erabiltzailea, data, iruzkina,
		sagardotegia) VALUES ('$erabiltzailea', '$data', '$iruzkina', 
		'$sagardotegia');";
		
		$result=mysqli_query($con, $sql);
		header("Location: gorde.php?iruzkina=$iruzkina&erabiltzailea=$erabiltzailea&data=$data&sagardotegia=$sagardotegia&herria=$herria");
	}
	else{
		header ("Location: sagardotegia.php?msg=error&izena=$sagardotegia&herria=$herria"); 
  		exit;
	}
	mysqli_close($con);
?>
