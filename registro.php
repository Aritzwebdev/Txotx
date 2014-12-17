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
?>
		<script type="text/javascript">
			alert("Erregistroa ondo burutu da.");
			location.href = "index.php";
		</script>
<?php
	}

	mysqli_close($con);
?>