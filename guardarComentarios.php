<?php
	session_start();

	include 'conectar.php';
	$con=conectar();

if(!isset($_SESSION["user"])){
	$erabiltzailea=$_POST['erabiltzailea'];
	$pasahitza=$_POST['pasahitza'];
	$iruzkina=$_POST['iruzkina'];
	$data=$_POST['data'];
	$sagardotegia=$_POST['izena'];
	$herria=$_POST['herria'];
}else{
	$erabiltzailea=$_SESSION['user'];

	$sql="SELECT pasahitza FROM erabiltzaileak WHERE erabiltzailea='".$erabiltzailea."';";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);

	$pasahitza=$row["pasahitza"];

	$iruzkina=$_POST['iruzkina'];
	$data=$_POST['data'];
	$sagardotegia=$_POST['izena'];
	$herria=$_POST['herria'];
}
	

	

	$sql="SELECT erabiltzailea, pasahitza FROM erabiltzaileak 
		WHERE erabiltzailea='".$erabiltzailea."';";
	$result=mysqli_query($con, $sql);
	
	if(!$result){
		echo "Error resultado";
		exit;
	}

	if($row=mysqli_fetch_array($result);){
		if($row['pasahitza']==$pasahitza){
			
			$sql="INSERT INTO iruzkinak (erabiltzailea, data, iruzkina,
			sagardotegia) VALUES ('$erabiltzailea', '$data', '$iruzkina', 
			'$sagardotegia');";
			
			$result=mysqli_query($con, $sql);
			echo "";
		}
		else{
			echo "Pasahitz okerra";
		}
	}else{
		echo "Erabiltzaile okerra";
	}
	mysqli_close($con);
?>
