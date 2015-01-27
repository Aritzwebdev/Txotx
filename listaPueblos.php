<?php 

session_start();

//Creamos la conexión
include('conectar.php');
$conexion = conectar();

$probintzia = $_SESSION['probintzia'];

//generamos la consulta
$sql = "SELECT idherriak ,izena FROM herriak WHERE probintzia='".$probintzia."';";
mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($conexion, $sql)) die();

$pueblos = array(); //creamos un array

while($row = mysqli_fetch_array($result)) 
{ 
	
	$idherria = $row['idherriak'];
	$herria=$row['izena'];

	$pueblos[] = array('idHerria' => $idherria, 'Herria'=> $herria);

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