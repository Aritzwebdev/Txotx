<?php
include 'conectar.php';
$con=conectar();

if(isset($_POST['anadirSagardotegi'])){
	if(!empty($_POST['izena'])){
		$izena=$_POST['izena'];
		$herria=$_POST['herria'];
		$deskribapena=$_POST['deskribapena'];
		$probintzia=$_POST['probintzia'];
		$telefonoa=$_POST['telefonoa'];
		$email=$_POST['email'];
		if($_POST['web']==""){
			$web="";
		}else{
			$web=$_POST['web'];
		}
		
		$sql="SELECT * FROM sagardotegiak WHERE izena='$izena'";
		$result = mysqli_num_rows(mysqli_query($con, $sql));
		if($result==0){
			$sql="INSERT INTO sagardotegiak (izena, herria, deskribapena,
			probintzia, telefonoa, email,web) VALUES ('$izena', '$herria', '$deskribapena', 
			'$probintzia','$telefonoa', '$email', '$web');";
			$result=mysqli_query($con, $sql);
			if($result){
				echo "<script type='text/javascript'>alert('$izena sagardotegia gehitu da');location.href = 'admin.php';</script>";
			}else{
				echo "<script type='text/javascript'>alert('Ezin da sagardotegia sartu');location.href = 'admin.php';</script>";
			}
		}else{
		  	echo "<script type='text/javascript'>alert('La sidreria $izena ya existe');location.href = 'admin.php';</script>";
		}
	}else{
		echo "Sartu sagardotegiaren izena";
	}
}else{
	header("Location:admin.php");
}