<?php
	session_start();

	include 'conectar.php';
	$con=conectar();

	$erabiltzailea=$_SESSION['user'];

	$sql="SELECT erabiltzailea, pasahitza FROM erabiltzaileak WHERE erabiltzailea='".$erabiltzailea."';";
	$result=mysqli_query($con,$sql);

	if(!$result){
		echo "Error resultado";
		exit;
	}

	$row=mysqli_fetch_array($result);

	$pasahitza=$row["pasahitza"];

	$iruzkina=$_POST['iruzkina'];
	$data=date("Y-m-d H:i:s");
	$sagardotegia=$_SESSION['Sagardotegia'];
	$herria=$_SESSION=['Herria'];	

	if($row=mysqli_fetch_array($result)){
		if($row['pasahitza']==$pasahitza){
			
			$sql="INSERT INTO iruzkinak (erabiltzailea, data, iruzkina,
			sagardotegia) VALUES ('$erabiltzailea', '$data', '$iruzkina', 
			'$sagardotegia');";
			
			$result=mysqli_query($con, $sql);
			echo $_SESSION['user'];
			echo $pasahitza;
			echo $_SESSION['Sagardotegia'];
			echo $_SESSION['Herria'];
		}else{
			echo "Pasahitz okerra";
		}
	}else{
		echo "Erabiltzaile okerra";
	}
	mysqli_close($con);
?>
