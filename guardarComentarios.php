<?php
	session_start();

	include 'conectar.php';
	$con=conectar();

	$erabiltzailea=$_SESSION['user'];

	$iruzkina=$_POST['iruzkina'];

	$data=date("Y-m-d H:i:s");
	$sagardotegia=$_SESSION['Sagardotegia'];
	$herria=$_SESSION=['Herria'];

	echo $erabiltzailea;
	echo $iruzkina;
	echo $data;
	echo $sagardotegia;
	echo $herria;

	if($iruzkina==""){
		echo "Ez duzu iruzkinik sartu";
	}else{
			
		$sql="INSERT INTO iruzkinak (erabiltzailea, data, iruzkina,
		sagardotegia) VALUES ('$erabiltzailea', '$data', '$iruzkina', 
		'$sagardotegia');";
				
		$result=mysqli_query($con, $sql);
		echo "";
	}
	mysqli_close($con);
?>
