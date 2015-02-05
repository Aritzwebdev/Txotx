<?php
if(!getenv('OPENSHIFT_MYSQL_DB_HOST')){
	function conectar(){
		$con=mysqli_connect("localhost", "root", "zubiri") or die(mysqli_error());
		mysqli_select_db("txotx");
		return $con;
	}
}else{
	$server=getenv('OPENSHIFT_MYSQL_DB_HOST');
	//$db=getenv('OPENSHIFT_APP_NAME');
	$user=getenv('OPENSHIFT_MYSQL_DB_USERNAME');
	$password=getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
	
	function conectar(){
		$con=mysqli_connect($server,$user,$password,"") or die(mysqli_error());
		mysqli_select_db("txotx");
		return $con;
	}
}
?>