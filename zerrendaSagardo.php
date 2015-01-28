<?php 

	session_start();

	$sagardotegia = $_GET['Sagardotegia'];

	if(!isset($_SESSION['Sagardotegia'])){
		$_SESSION['Sagardotegia'] = $sagardotegia;
	}else{
		$_SESSION['Sagardotegia'] = $sagardotegia;
	}

	header("location: sagardotegia.php");

?>