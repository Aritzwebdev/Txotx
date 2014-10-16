<html>
<body>
<?php
	$herria=$_POST["herria"];

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

	$sql="SELECT izena FROM sagardotegiak WHERE herria='".$id."';";
	$result=mysql_query($sql, $con);

	while($row=mysql_fetch_array($result)){
		echo $row['izena']."<br>";
	}
	
?>
</body>
</html>