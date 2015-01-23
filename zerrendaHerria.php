<?php 

	session_start();

	$herria = $_GET['herria'];

	if(!isset($_SESSION['herria'])){
		$_SESSION['herria'] = $herria;
	}else{
		$_SESSION['herria'] = $herria;
	}

	header("location: herria.php");

?>