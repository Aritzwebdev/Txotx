<?php
	session_start();

	include 'conectar.php';
	$con=conectar();

if(!isset($_SESSION["user"])){
	$erabiltzailea=$_GET['erabiltzailea'];
	$pasahitza=$_GET['pasahitza'];
	$iruzkina=$_GET['iruzkina'];
	$data=$_GET['data'];
	$sagardotegia=$_GET['izena'];
	$herria=$_GET['herria'];
}else{
	$erabiltzailea=$_SESSION['user'];

	$sql="SELECT pasahitza FROM erabiltzaileak WHERE erabiltzailea='".$erabiltzailea."';";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);

	$pasahitza=$row["pasahitza"];

	$iruzkina=$_GET['iruzkina'];
	$data=$_GET['data'];
	$sagardotegia=$_GET['izena'];
	$herria=$_GET['herria'];
}
	

	

	$sql="SELECT erabiltzailea, pasahitza FROM erabiltzaileak 
		WHERE erabiltzailea='".$erabiltzailea."';";
	$result=mysqli_query($con, $sql);
	$row=mysqli_fetch_array($result);

	if($row['erabiltzailea']==$erabiltzailea&&$row['pasahitza']==$pasahitza){
		
		$sql="INSERT INTO iruzkinak (erabiltzailea, data, iruzkina,
		sagardotegia) VALUES ('$erabiltzailea', '$data', '$iruzkina', 
		'$sagardotegia');";
		
		$result=mysqli_query($con, $sql);
		echo "";
	}
	else{
		echo "Erabiltzaile edo pasahitz okerra";
	}
	mysqli_close($con);
?>
