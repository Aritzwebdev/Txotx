<?php
	$con=mysqli_connect("localhost", "root", "zubiri", "txotx");
	/*$con = mysqli_connect(getenv('OPENSHIFT_MYSQL_DB_HOST'), getenv('OPENSHIFT_MYSQL_DB_USERNAME'), getenv('OPENSHIFT_MYSQL_DB_PASSWORD'), "", getenv('OPENSHIFT_MYSQL_DB_PORT')) or die("Error: " . mysqli_error($con));*/

	if(!$con){
		echo "Conexion fallida";
		exit;
	}

	/*mysqli_select_db($con, getenv('OPENSHIFT_APP_NAME')) or die("Error: " . mysqli_error($con));*/

	/*if(!mysqli_select_db("txotx", $con)){
		echo "Error seleccion base de datos";
		exit;
	}*/
?>