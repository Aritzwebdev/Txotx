<?php 

	session_start();

	$herria = $_GET['Herria'];

	if(!isset($_SESSION['Herria'])){
		$_SESSION['Herria'] = $herria;
	}else{
		$_SESSION['Herria'] = $herria;
	}

	header("location: herria.php");

?>