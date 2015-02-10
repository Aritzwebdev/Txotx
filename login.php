<?php
	session_start();
		
	if($_POST["user"]=="" && $_POST["pass"]==""){
		echo "Sartu erabiltzaile eta pasahitza";
	}else{
		$user=$_POST["user"];
		$pass=$_POST["pass"];
	}

	include 'conectar.php';
	
	$con=conectar();
	
	$sql="SELECT iderabiltzaileak ,erabiltzailea, pasahitza FROM erabiltzaileak WHERE erabiltzailea='".$user."';";
	$result=mysqli_query($con, $sql);

	if(!$result){
		echo "Error resultado";
		exit;
	}
	
	$pasahitz = md5($pass);

	if($row=mysqli_fetch_array($result)){
	//$row=mysql_fetch_array($result);
		if($user=="Admin" && $pasahitz==$row['pasahitza']){
			$_SESSION["user"]="Admin";
			echo " ";
		}else{
			if($row['erabiltzailea']==$user && $row['pasahitza']==$pasahitz){
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