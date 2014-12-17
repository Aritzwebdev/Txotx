<?php

  session_start();
  $user = '2';

              include "conectar.php";
              $con = conectar();
              
                /* Parametros */
                if(isset($_GET['user']) && intval($_GET['user'])) {

                               /* recibir variables por medio de GET */
                               $usuariosId = isset($_GET['num']) ? intval($_GET['num']) : $user; // # 1 es default
                               $format = 'json'; //tipo de formato que devuelve es JSON

                               /* consulta a la tabla comida dependiendo del id del usuario */

                               $sql = "SELECT iderabiltzaileak,erabiltzailea FROM erabiltzaileak WHERE iderabiltzaileak='$usuariosId'";
                               $result=mysqli_query($con, $sql);

                                if(!$result){
                                  echo "Error resultado";
                                  exit;
                                }

                              $usuario;
                              while($row=mysqli_fetch_array($result)){
                                //$row=mysql_fetch_array($result);
                                if($row['iderabiltzaileak']==$usuariosId){
                              
                                  GLOBAL $usuario;
                                  $usuario = $row['erabiltzailea'];
                                
                                  break;
                                }
                              }

                               /* salida de datos en formato json */
                               if($format == 'json') {
                                               header('Content-type: application/json');
                                               echo json_encode(array('user'=>$usuario));
                               }

                }
?>