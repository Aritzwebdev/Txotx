<?php
	include("conectar.php");
	$con=conectar();
	session_start();

	if(isset($_POST['erabiltzailea']) && isset($_POST['pasahitza']))
	{
	// erabiltzailea and pasahitza sent from Form
	$erabiltzailea=mysqli_real_escape_string($con,$_POST['erabiltzailea']); 
	//Here converting passsword into MD5 encryption. 
	$pasahitza=/*md5(*/mysqli_real_escape_string($con,$_POST['pasahitza'])/*)*/; 

	$result=mysqli_query($con,"SELECT iderabiltzaileak, erabiltzailea, pasahitza FROM erabiltzaileak WHERE erabiltzailea='".$erabiltzailea."' and pasahitza='".$pasahitza."';");
	$count=mysqli_num_rows($result);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	// If result matched $erabiltzailea and $pasahitza, table row  must be 1 row
	if($count==1){
	$_SESSION['user']=$row['erabiltzailea']; //Storing user session value.
	}else{
		$_SESSION['error'] = "Erabiltzaile edo pasahitz desegokia";
	}

	}
?>

<!--<?php/*
	session_start();

	$user=$_POST["erabiltzailea"];
	$pass=$_POST["pasahitza"];
	$encontrado;
	
	include 'conectar.php';
	$con=conectar();

	$sql="SELECT iderabiltzaileak ,erabiltzailea, pasahitza FROM erabiltzaileak;";
	$result=mysqli_query($con, $sql);

	if(!$result){
		echo "Error resultado";
		exit;
	}
	
	while($row=mysqli_fetch_array($result)){
		//$row=mysql_fetch_array($result);
		if($row['erabiltzailea']==$user && $row['pasahitza']==$pass){
			GLOBAL $encontrado;
			$encontrado=true;

			$id = $row['iderabiltzaileak'];
			break;
		}
	}
	if($encontrado==true){
?>
		<script type="text/javascript">
			location.href = "index.php";
		</script>
<?php
		if (!isset($_SESSION["user"])){ 
		   	$_SESSION["user"] = $user; 
		   	$_SESSION["id"] = $id;
		}else{ 
		   	$_SESSION["user"]=""; 
		} 
		
	}
	mysqli_close($con);
*/?>
-->