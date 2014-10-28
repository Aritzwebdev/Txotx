<html>
<head>
	<link rel="stylesheet" href="bilatu.css"/>
</head>
<body>
<?php
	$herria=$_POST["herria"];
?>
	<div id="header">
		<img id="logo" src="img/logo.png"/>
		<h1><?php echo $herria ?></h1>
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
	$sql="SELECT idherriak FROM herriak WHERE izena='".$herria."';";
	$result=mysql_query($sql, $con);

	if(!$result){
		echo "Error resultado";
		exit;
	}

	$idherria=mysql_fetch_array($result);
	$id=$idherria['idherriak'];

	$sql="SELECT izena, deskribapena, telefonoa, email, web FROM sagardotegiak WHERE herria='".$id."';";
	$result=mysql_query($sql, $con);

	
	while($row=mysql_fetch_array($result)){
?>
		<div id="izena">
			<a href=""><?php
				echo $row['izena']."<br>";
			?></a>
		</div>
		<div id="deskribapena" border="1px solid black">
			<?php
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