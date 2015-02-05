<?php
/*if(!getenv('OPENSHIFT_MYSQL_DB_HOST')){
	function conectar(){
		$con=mysqli_connect("localhost", "root", "zubiri","txotx") or die(mysqli_error());
		return $con;
	}
}else{*/
	$server="127.608.2";
	$db="txotx";
	$user=;
	$password=;
	
	function conectar(){
		$con=mysqli_connect($server,$user,$password,$db) or die(mysqli_error());
		return $con;
	}
//}
?>