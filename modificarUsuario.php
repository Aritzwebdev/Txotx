<?php
session_start();
include 'conectar.php';
$con=conectar();


if(isset($_POST['butdatuak'])){
	$erabiltzailea=$_POST['erabiltzailea'];
	$izena=$_POST['izena'];
	$abizena=$_POST['abizena'];
	$email=$_POST['email'];
	$user=$_SESSION['user'];
	
	$sql="UPDATE erabiltzaileak SET erabiltzailea='$erabiltzailea', izena='$izena', abizena='$abizena', email='$email' WHERE erabiltzailea='$user'";
	$result=mysqli_query($con, $sql);
	if($result){
		echo "<script type='text/javascript'>alert('Datuak aldatu dira');location.href = 'perfil.php';</script>";
	}else{
		echo "<script type='text/javascript'>alert('Ezin da datuak aldatu');location.href = 'perfil.php';</script>";
	}
}else{
	header("Location:perfil.php");
}