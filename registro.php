<?php
	$izena=$_POST['izena'];
	$abizena=$_POST['abizena'];
	$email=$_POST['email'];
	$erabiltzailea=$_POST['user'];
	$pasahitza=$_POST['pass'];

	include 'conectar.php';
	$con=conectar();

	$sql="SELECT * FROM erabiltzaileak WHERE erabiltzailea='".$erabiltzailea."';";
	$result=mysqli_query($con, $sql);
	$row=mysqli_fetch_array($result);

	if($row['erabiltzailea']==$erabiltzailea || $row['email']==$email){
		echo "Jadanik badago erabiltzaile bat datu hoiekin.";
	}else{
		$sql="INSERT INTO erabiltzaileak (erabiltzailea, pasahitza, izena,
			abizena, email) VALUES ('$erabiltzailea', '$pasahitza', '$izena', 
			'$abizena', '$email');";
		$result=mysqli_query($con, $sql);

		echo "Erregistroa ondo burutu da";
		/*header("Location: index.html?var=1");
		die();*/
	}

	mysqli_close($con);
?>