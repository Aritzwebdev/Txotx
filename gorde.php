
<?php
	$iruzkina=$_GET['iruzkina'];
	$erabiltzailea=$_GET['erabiltzailea'];
	$data=$_GET['data'];
	$sagardotegia=$_GET['sagardotegia'];
	$herria=$_GET['herria'];

	include 'conectar.php';
	$con=conectar();

	$sql="INSERT INTO iruzkinak (erabiltzailea, data, iruzkina,
		sagardotegia) VALUES ('$erabiltzailea', '$data', '$iruzkina', 
		'$sagardotegia');";
	$result=mysqli_query($con, $sql);

	/*if(!$result){
		echo "Error resultado";
		exit;
	}*/

	header("Location: sagardotegia.php?izena=$sagardotegia&herria=$herria");
	die();

	mysqli_close($con);
?>
