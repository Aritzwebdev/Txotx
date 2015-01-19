<?php
if(!getenv('OPENSHIFT_MYSQL_DB_HOST')){
	function conectar(){
		$con=mysqli_connect("localhost", "root", "zubiri","txotx");
		return $con;
	}
}else{

	$mysqlCon = mysqli_connect(getenv('OPENSHIFT_MYSQL_DB_HOST'), 
				getenv('OPENSHIFT_MYSQL_DB_USERNAME'), 
				getenv('OPENSHIFT_MYSQL_DB_PASSWORD'), 
				"", 
				getenv('OPENSHIFT_MYSQL_DB_PORT')) or die("Error: " . mysqli_error($mysqlCon));
	
	mysqli_select_db($mysqlCon, getenv('OPENSHIFT_APP_NAME')) or die("Error: " . mysqli_error($mysqlCon));
	
	return $mysqlCon;
	}
}
?>