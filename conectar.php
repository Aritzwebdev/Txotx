<?php
//if(!getenv('OPENSHIFT_MYSQL_DB_HOST')){
	function conectar(){
		$con=mysqli_connect("localhost", "root", "zubiri","txotx");
		return $con;
	}
/*}else{
	function conectar(){
		$con = mysqli_connect(getenv('OPENSHIFT_MYSQL_DB_HOST'), getenv('OPENSHIFT_MYSQL_DB_USERNAME'), getenv('OPENSHIFT_MYSQL_DB_PASSWORD'), getenv('OPENSHIFT_APP_NAME')) , getenv('OPENSHIFT_MYSQL_DB_PORT')) or die("Error: " . mysqli_error($con));
		return $con;
	}
}*/
?>