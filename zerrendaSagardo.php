<?php 

	session_start();

	include('conectar.php');
	$con=conectar();

	$sagardotegia = $_GET['Sagardotegia'];

	$sql="SELECT herriak.izena FROM herriak INNER JOIN sagardotegiak ON sagardotegiak.herria=herriak.idherriak WHERE sagardotegiak.izena='".$sagardotegia."';";
	$result=mysqli_query($con, $sql);
	$row=mysqli_fetch_array($result);
	
	$_SESSION['Herria']=$row['izena'];

	$_SESSION['Sagardotegia'] = $sagardotegia;

	header("location: sagardotegia.php");

?>