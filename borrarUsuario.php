<?php
include 'conectar.php';
$con=conectar();

if(isset($_POST['borrarUsuario'])){
	if(!empty($_POST['erabiltzaile'])){
		$erabiltzailea=$_POST['erabiltzaile'];
		$sql="SELECT * FROM erabiltzaileak WHERE erabiltzailea='$erabiltzailea'";
		$result = mysqli_num_rows(mysqli_query($con, $sql));
		if($result==0){
		    echo "<script type='text/javascript'>alert('El usuario $erabiltzailea no existe');location.href = 'admin.php';</script>";
		}else{
		  	$sql="DELETE FROM erabiltzaileak WHERE erabiltzailea='$erabiltzailea'";
			$result=mysqli_query($con, $sql);
			if($result){
				echo "<script type='text/javascript'>alert('$erabiltzailea erabiltzailea ezabatu da');location.href = 'admin.php';</script>";
			}else{
				echo "<script type='text/javascript'>alert('Ezin da erabiltzailea ezabatu');location.href = 'admin.php';</script>";
			}
		}
		
	}else{
		echo "Sartu erabiltzailea";
	}
}else{
	header("Location:admin.php");
}
?>