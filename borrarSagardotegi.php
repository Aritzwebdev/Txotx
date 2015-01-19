<?php
include 'conectar.php';
$con=conectar();

if(isset($_POST['borrarSagardotegi'])){
	if(!empty($_POST['sagardotegi'])){
		$sagardotegi=$_POST['sagardotegi'];
		$sql="SELECT * FROM sagardotegiak WHERE izena='$sagardotegi'";
		$result = mysqli_num_rows(mysqli_query($con, $sql));
		if($result==0){
		    echo "<script type='text/javascript'>alert('La sidreria $sagardotegi no existe');location.href = 'admin.php';</script>";
		}else{
		  	$sql="DELETE FROM sagardotegiak WHERE izena='$sagardotegi'";
			$result=mysqli_query($con, $sql);
			if($result){
				echo "<script type='text/javascript'>alert('$sagardotegi sagardotegia ezabatu da');location.href = 'admin.php';</script>";
			}else{
				echo "<script type='text/javascript'>alert('Ezin da sagardotegia ezabatu');location.href = 'admin.php';</script>";
			}
		}
		
	}else{
		echo "Sartu sagardotegiaren izena";
	}
}else{
	header("Location:admin.php");
}
?>