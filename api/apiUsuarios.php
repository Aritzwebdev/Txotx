<?php

  session_start();

    include "../conectar.php";
    $con = conectar();

    $userid = $_GET['user'];
    settype($userid, "integer");

              /*
                /* Parametros */
                if(isset($_GET['user']) && intval($_GET['user'])) {

                               /* recibir variables por medio de GET */
                               $usuariosId = isset($userid) ? intval($userid) : 1; // # 1 es default
                               $format = 'json'; 
                               //tipo de formato que devuelve es JSON

                               /* consulta a la tabla comida dependiendo del id del usuario */

                               $sql = "SELECT iderabiltzaileak,erabiltzailea, izena FROM erabiltzaileak WHERE iderabiltzaileak=".$usuariosId.";";
                               //$sql = "SELECT iderabiltzaileak,erabiltzailea FROM erabiltzaileak WHERE iderabiltzaileak='3';";
                                
                                $result=mysqli_query($con, $sql);

                                if(!$result){
                                  echo "Error resultado";
                                  exit;
                                }
                              
                              $usuario;
                              $izena;
                              while($row=mysqli_fetch_array($result)){
//                                $row=mysqli_fetch_array($result);
                                
                                if($row['iderabiltzaileak']==$usuariosId){
                              
                                  GLOBAL $usuario;
                                  GLOBAL $izena;
                                  $usuario = $row['erabiltzailea'];
                                  $izena = $row['izena'];
                                  break;
                                }
                              }

                               /* salida de datos en formato json */
                               if($format == 'json') {
                                               header('Content-type: application/json');
                                               echo json_encode(array('user'=>$usuario,
                                                                      'izena'=>$izena));
                               }

                }
?>