<?php

  session_start();

    include "../conectar.php";
    $con = conectar();

    $sHerria = $_GET['herria'];
    echo $sHerria;
    
                
                /* Parametros */
                if(isset($_GET['herria']) && intval($_GET['herria'])) {

                               /* recibir variables por medio de GET */
                               $herrizena = isset($sHerria) ? intval($sHerria) : 1; // # 1 es default
                               $format = 'json'; 
                               //tipo de formato que devuelve es JSON

                               /* consulta a la tabla comida dependiendo del id del usuario */

                               $sql = "SELECT izena FROM herriak WHERE izena=".$herrizena.";";
                               //$sql = "SELECT iderabiltzaileak,erabiltzailea FROM erabiltzaileak WHERE iderabiltzaileak='3';";
                                
                                $result=mysqli_query($con, $sql);

                                if(!$result){
                                  echo "Error resultado";
                                  exit;
                                }
                              
                              $H;
                              while($row=mysqli_fetch_array($result)){
                                //$row=mysqli_fetch_array($result);
                                
                                if($row['izena']==$herrizena){
                              
                                  GLOBAL $H;
                                  GLOBAL $izena;
                                  $H = $row['izena'];
                                  break;
                                }
                              }

                               /* salida de datos en formato json */
                               /*if($format == 'json') {
                                               header('Content-type: application/json');
                                               echo json_encode(array('WeatherText'=>$H));
                               }*/

                }
?>