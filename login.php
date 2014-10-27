<html>
<body>
<?php

	$user=$_POST["user"];
	$pass=$_POST["pass"];

	$con=mysql_connect("localhost", "root", "zubiri");

	if(!$con){
		echo "Conexion fallida";
		exit;
	}

	if(!mysql_select_db("txotx", $con)){
		echo "Error seleccion base de datos";
		exit;
	}
	$sql="SELECT erabiltzailea, pasahitza FROM erabiltzaileak;";
	$result=mysql_query($sql, $con);

	if(!$result){
		echo "Error resultado";
		exit;
	}
	$encontrado;
	while($row=mysql_fetch_array($result)){
		//$row=mysql_fetch_array($result);
		if($row['erabiltzailea']==$user && $row['pasahitza']==$pass){
			GLOBAL $encontrado;
			$encontrado=true;
			break;
		}
	}
	
	if($encontrado==true){
		echo "Ongi etorri ".$user;
	}else{
		echo "Erabiltzaile hori ez da existitzen edo datuak gaizki daude.";
	}
	mysqli_close($con);
?>
</body>
</html>