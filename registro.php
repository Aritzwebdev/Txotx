<?php
	session_start();

	$izena=$_POST['izena'];
	$abizena=$_POST['abizena'];
	$email=$_POST['email'];
	$erabiltzailea=$_POST['erabiltzailea'];
	$pasahitza=$_POST['pasahitza'];

	include 'conectar.php';
	$con=conectar();

	$sql="SELECT * FROM erabiltzaileak";
	$result=mysqli_query($con, $sql);
	$row=mysqli_fetch_array($result);

	if($row['erabiltzailea']==$erabiltzailea || $row['email']==$email){
?>
		<script type="text/javascript">
			alert("Jadanik badago erabiltzaile bat datu hoiekin.");
			location.href = "index.php";
		</script>
<?php
	}else{
		$sql="INSERT INTO erabiltzaileak (erabiltzailea, pasahitza, izena,
			abizena, email) VALUES ('$erabiltzailea', '$pasahitza', '$izena', 
			'$abizena', '$email');";
		$result=mysqli_query($con, $sql);

		if (!isset($_SESSION["user"])){ 
		   	$_SESSION["user"] = $erabiltzailea; 
		   	$_SESSION["id"] = $id;
		}else{ 
		   	$_SESSION["user"]=""; 
		} 
?>
		<script type="text/javascript">
			alert("Erregistroa ondo burutu da.");
			location.href = "index.php";
		</script>
<?php
	}

	mysqli_close($con);
?>