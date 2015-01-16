<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>  <!--/*http://code.jquery.com/jquery-2.1.0.min.js-->     
        <script type="text/javascript" language="javascript" src="js/jquery.dropdownPlain.js"></script>


        <link rel="stylesheet" href="css/menu.css" media="screen, projection"/>
        <link rel="stylesheet" href="css/admin.css" />
        

        <script type="text/javascript">
                
                function logout(){
                    location.href="logout.php";
                }

                function perfil(){
                    location.href="perfil.php";
                }
        </script>

</head>
<body>

    <h1 id="titulo">SagardoteGida</h1>

    <!-- MENU --> 

     <header id="registro">
        <div class="container">
            <ul id="nav">
                <li><a href="#s1">Sagardotegiak</a>
                    <span id="s1"></span>
                    <ul class="subs">
                        <li><a href="#" id="anadirSagardotegi">Gehitu</a></li>
                        <li><a href="#" id="borrarSagardotegi">Ezabatu</a></li>
                    </ul>
                </li>
              	<li><a href="#" id="borrarUsuarios">Erabiltzaileak</a></li>
               <li><a href="#" id="borrarComentarios">Iruzkinak</a></li>
            </ul>
                <div id="hizkuntzak">
                    <li><a href="">eu</a></li>
                    <li>|</li>
                    <li><a href="">es</a></li>
                </div>
            
        </ul>
        </div>

    </header>

<!-- WEB -->
        <img id="fondo" src="img/txotx.jpg" alt="background" href="#"/>
        <div id="borrar">             
            <form class="form-3" action="borrarSagardotegi.php" method="post" >
                    <div>
                        <label for="sagardotegi" style="padding: 10px 0px 2px 0px;"><font color="white">Sagardotegi Ezabatu</font></label>
                        <input type="text" name="sagardotegi" id="sagardotegi" placeholder="Sartu sagardotegiaren izena" required title="Sartu erabiltzaile izena">
                    </div>
                    <div class="submit">
                        <input type="submit" value="Ezabatu" name="borrarSagardotegi">
                    </div>                
            </form>
        </div>
        <div id="anadir">
            <form class="form-4" action="anadirSagardotegi.php" method="post" >
                    <div>
                        <label for="sagardotegi" style="padding: 10px 0px 2px 0px;"><font color="white">Sagardotegi Gehitu</font></label>
                        <input type="text" name="sagardotegi" id="sagardotegi" required title="Sartu erabiltzaile izena">
                    </div>
                    <div class="submit">
                        <input type="submit" value="Gehitu" name="anadirSagardotegi">
                    </div>                
            </form>
        </div> 
        <div id="usuarios">
            <form class="form-5" action="borrarUsuario.php" method="post" >
                    <div>
                        <label for="erabiltzaile" style="padding: 10px 0px 2px 0px;"><font color="white">Erabiltzaile Ezabatu</font></label>
                        <input type="text" name="erabiltzaile" id="erabiltzaile" placeholder="Sartu erabiltzailea" required title="Sartu erabiltzaile izena">
                    </div>
                    <div class="submit">
                        <input type="submit" value="Ezabatu" name="borrarUsuario">
                    </div>                
            </form>
        </div>
        <div id="comentarios">
            <form class="form-6" action="borrarComentarios.php" method="post" >
                    <div>
                        <label for="iruzkina" style="padding: 10px 0px 2px 0px;"><font color="white">Iruzkina Ezabatu</font></label>
                        <input type="text" name="iruzkina" id="iruzkina" required title="Sartu erabiltzaile izena">
                    </div>
                    <div class="submit">
                        <input type="submit" value="Ezabatu" name="borrarComentario">
                    </div>                
            </form>
        </div>
        <div id="subtitulo"><h2>Panel Administrador</h2></div>
       
        <footer id="footer">
                                Copyleft Aritz Etxegia, Rubén Aparicio y Lander Reyes 2014 / 2015
        </footer>
</body>



    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_es.js "></script>
    
<script type="text/javascript">

    $(document).ready(function(){
		$('#borrar').hide();
		$('#anadir').hide();
		$('#usuarios').hide();
		$('#comentarios').hide();


    	$('#borrarSagardotegi').click(function(){
    		$('#borrar').show();
    		$('#anadir').hide();
    		$('#usuarios').hide();
    		$('#comentarios').hide();
    	});	

    	$('#anadirSagardotegi').click(function(){
    		$('#borrar').hide();
    		$('#anadir').show();
    		$('#usuarios').hide();
    		$('#comentarios').hide();
    	});

    	$('#borrarUsuarios').click(function(){
    		$('#borrar').hide();
    		$('#anadir').hide();
    		$('#usuarios').show();
    		$('#comentarios').hide();
    	});	

    	$('#borrarComentarios').click(function(){
    		$('#borrar').hide();
    		$('#anadir').hide();
    		$('#usuarios').hide();
    		$('#comentarios').show();
    	});	

    	$('img').click(function(){
    		$('#borrar').hide();
    		$('#anadir').hide();
    		$('#usuarios').hide();
    		$('#comentarios').hide();
    	});
  
    });

    /*  API PARA VALIDAR FORMULARIO DE REGISTRO  */

        /**function iniciar(){
          user=document.getElementById("erabiltzailea");
          user.addEventListener("input", validacion, false);
          pass=document.getElementById("pasahitza");
          pass.addEventListener("input", validacion, false);  
          izena=document.getElementById("izena");
          izena.addEventListener("input", validacion, false);
          abizena=document.getElementById("abizena");
          abizena.addEventListener("input", validacion, false);
          email=document.getElementById("email");
          email.addEventListener("input", validacion, false);
          kode=document.getElementById("kodea");
          kode.addEventListener("input", validacion, false);
          validacion();
        }

        function validacion(){
        if(user.value==""){
          user.setCustomValidity('Sartu erabiltzailea');
          
          }else{
          user.setCustomValidity('');
          
        }

        if(pass.value==""){
          pass.setCustomValidity('Sartu pasahitza');
          
        }else if(pass.length < 6){
            pass.setCustomValidity('Pasahitza motzegia da');
           
        }else{
          pass.setCustomValidity('');
         
        }

        if(email.value==""){
          email.setCustomValidity('Sartu emaila');
          
          }else{
          email.setCustomValidity('');
        
        }

        if(izena.value==""){
          izena.setCustomValidity('Sartu zure izena');
          
          }else if(izena.value.length < 3){
            izena.setCustomValidity('Izena 3 karaktere edo gehiago eduki behar ditu');
          }
          else{
          izena.setCustomValidity('');
        }

        if(abizena.value==""){
          abizena.setCustomValidity('Sartu zure abizena');
          }else if(abizena.value.length < 3){
            abizena.setCustomValidity('Abizena 3 karaktere edo gehiago eduki behar ditu');
          }else{
          abizena.setCustomValidity('');
        }

        if(kode.value==""){
          kode.setCustomValidity('Sartu ikusten duzun zenbakia');
          }else{
          kode.setCustomValidity('');
        }

        }

        window.addEventListener("load", iniciar, false);*/

    </script>

<html>