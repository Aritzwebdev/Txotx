<?php
	session_start();

	$user=$_POST["user"];
	$pass=$_POST["pass"];
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
		if (!isset($_SESSION["user"])){ 
		   	$_SESSION["user"] = $user; 
		   	$_SESSION["id"] = $id;
		}else{ 
		   	$_SESSION["user"]=""; 
		} 
?>
		<script type="text/javascript">
			location.href = "index.php";
		</script>
<?php
		//header("Location: index.php"); die;
	}else{
?>
		<script type="text/javascript">
			location.href = "index.php";
		</script>
<?php
		//header("Location: index.php"); die;
	}
	mysqli_close($con);
?>
