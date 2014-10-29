<html>
<head>
	<link rel="stylesheet" href="sagardotegia.css"/>
</head>
<body>
<?php
	$izena=$_POST['izena'];
	$herria=$_POST['herria'];
?>
<div id="menu_txikia">
	<form action="bilatu.php" method="post">
		<input id="menu_txiki_herria" type="submit" name="herria" value="<?php echo $herria;?>">
		<a id="menu_txiki_izena"><?php echo ">".$izena ?></a>
	</form>
</div>
<div id="izena">
	<h1><?php echo $izena ;?></h1>
</div>
<?php
	$con=mysql_connect("localhost", "root", "zubiri");

	if(!$con){
		echo "Conexion fallida";
		exit;
	}

	if(!mysql_select_db("txotx", $con)){
		echo "Error seleccion base de datos";
		exit;
	}
	$sql="SELECT deskribapena, telefonoa, email, web FROM sagardotegiak WHERE izena='".$izena."';";
	$result=mysql_query($sql, $con);

	if(!$result){
		echo "Error resultado";
		exit;
	}

	while($row=mysql_fetch_array($result)){
?>
		<div id="deskribapena">
			<?php
				echo "<br>";
				echo $row['deskribapena']."<br>";
				echo "Telefonoa: ".$row['telefonoa']."<br>";
				if($row['email']!=""){
					echo "Email: ".$row['email']."<br>";
				}
				if($row['web']!=""){
					echo "Web: ".$row['web']."<br>";
				} 
			?>
		</div>
<?php
	}	
?>	
	<div id="iruzkin_header">
		<h3>Iruzkinak</h3>
	</div>
	<div id="iruzkinak">
		<?php
		$sql="SELECT erabiltzailea, data, iruzkina FROM iruzkinak WHERE sagardotegia='".$izena."';";
		$result=mysql_query($sql, $con);

		if(!$result){
			echo "Error resultado";
		exit;
		}

		while($row=mysql_fetch_array($result)){
		?>

		
		
	</div>
	<div>
		<form action="iritzia.php" method="post">
			Erabiltzailea: <input type="text" name="user">
			<br>
			Iruzkina:<br><textarea name="iritzia" rows="5" ></textarea>
			<br>
			<input type="submit" value="Bidali"> 
		</form>
	</div>
	<?php
		$user=$_POST["user"];
		$iritzia=$_POST["iritzia"];
	?>

	<?php
		echo $user."<br><br>";
		echo $iritzia; 
	?>
</body>
</html>