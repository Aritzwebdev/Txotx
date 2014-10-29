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

</body>
</html>