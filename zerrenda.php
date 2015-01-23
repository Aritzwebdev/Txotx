<?php 

	session_start();

	$probintzia = $_GET['probintzia'];

	if(!isset($_SESSION['probintzia'])){
		$_SESSION['probintzia'] = $probintzia;
	}else{
		$_SESSION['probintzia'] = $probintzia;
	}

	header("location: bilatu.php");

?>