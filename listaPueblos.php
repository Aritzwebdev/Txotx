<?php 

$server = "localhost";
$user = "root";
$pass = "zubiri";
$bd = "txotx";

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");

//$probintzia = $_SESSION['probintzia'];

//generamos la consulta
$sql = "SELECT izena FROM herriak WHERE probintzia=1;";
mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($conexion, $sql)) die();

$pueblos = array(); //creamos un array

while($row = mysqli_fetch_array($result)) 
{ 
	
	$herria=$row['izena'];

	$pueblos[] = array('Herria'=> $herria);

}
	
//desconectamos la base de datos
$close = mysqli_close($conexion) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

//Creamos el JSON
$json_string = json_encode($pueblos);
echo $json_string;

//Si queremos crear un archivo json, sería de esta forma:
/*
$file = 'pueblos.json';
file_put_contents($file, $json_string);
*/
	

?>