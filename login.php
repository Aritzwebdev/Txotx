<?php
	session_start();
		
	$user=$_POST["user"];
	$pass=$_POST["pass"];

	include 'conectar.php';
	$con=conectar();

	$sql="SELECT iderabiltzaileak ,erabiltzailea, pasahitza FROM erabiltzaileak WHERE erabiltzailea='".$user."';";
	$result=mysqli_query($con, $sql);

	if(!$result){
		echo "Error resultado";
		exit;
	}
	
	if($row=mysqli_fetch_array($result)){
	//$row=mysql_fetch_array($result);
		if($user=="Admin" && $pass=="admin"){
			$_SESSION["user"]="Admin";
		}else{
			if($row['erabiltzailea']==$user && $row['pasahitza']==$pass){
				$_SESSION["user"]=$user;
				echo "";
			}else{
				echo "Pasahitz okerra";
			}
		}
	}else{
		echo "Erabiltzaile okerra";
	}
	mysqli_close($con);
?>