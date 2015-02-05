<?php
/*if(!getenv('OPENSHIFT_MYSQL_DB_HOST')){
	function conectar(){
		$con=mysqli_connect("localhost", "root", "zubiri","txotx") or die(mysqli_error());
		return $con;
	}
}else{*/
	$server=getenv('OPENSHIFT_MYSQL_DB_HOST');
	echo $server;
	$db=getenv('OPENSHIFT_APP_NAME');
	echo $db;
	$user=getenv('OPENSHIFT_MYSQL_DB_USERNAME');
	echo $user;
	$password=getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
	echo $password;
	
	function conectar(){
		$con=mysqli_connect($server,$user,$password,$db) or die(mysqli_error());
		return $con;
	}
//}
?>