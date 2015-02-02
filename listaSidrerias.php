<?php 

session_start();

//Creamos la conexión
include('conectar.php');
$conexion = conectar();

$herria = $_SESSION['Herria'];

//generamos la consulta
$sql = "SELECT sagardotegiak.idsagardotegiak, sagardotegiak.izena FROM sagardotegiak INNER JOIN herriak ON sagardotegiak.herria=herriak.idherriak WHERE herriak.izena='".$herria."';";
mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($conexion, $sql)) die();

$sidrerias = array(); //creamos un array

while($row = mysqli_fetch_array($result)) 
{ 
	$idSagar=$row['idsagardotegiak'];
	$sagardotegia=$row['izena'];

	$sidrerias[] = array('idSagardotegia'=> $idSagar, 'Sagardotegia'=> $sagardotegia);

}
	
//desconectamos la base de datos
$close = mysqli_close($conexion) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

//Creamos el JSON
$json_string = json_encode($sidrerias);
echo $json_string;

?>