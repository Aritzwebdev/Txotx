<?php
if(!getenv('OPENSHIFT_MYSQL_DB_HOST')){
	function conectar(){
		$con=mysqli_connect("localhost", "root", "zubiri","txotx");
		return $con;
	}
}else{
	$server=getenv('OPENSHIFT_MYSQL_DB_HOST');
	$user=getenv('OPENSHIFT_MYSQL_DB_USERNAME');
	$password=getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
	$db=getenv('OPENSHIFT_APP_NAME');
	function conectar(){
		$con=mysql_connect($server,$user,$password, $db) or die(mysql_error());
		return $con;
	}
}
?>