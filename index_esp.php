<?php 
    session_start();
    require 'vendor/autoload.php';
?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>  <!--/*http://code.jquery.com/jquery-2.1.0.min.js-->     
        <script type="text/javascript" src="http://builds.handlebarsjs.com.s3.amazonaws.com/handlebars-v2.0.0.js"></script>
        <script type="text/javascript" language="javascript" src="js/apiUsers.js"></script>

        <link rel="stylesheet" href="css/menu.css" media="screen, projection"/>
        <link rel="stylesheet" href="css/index.css" />

        <link href='css/media-player.css' rel='stylesheet' />
        <script src='js/media-player.js'></script>  
        <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/md5.js"></script>      

        <script type="text/javascript"> 

                function autoLog(id) {
                    var e = document.getElementById(id);
                    if(e.style.display == 'block'){
                        e.style.display = 'none';
                    }
                    else{
                        e.style.display = 'block';
                        document.getElementById('erabiltzaileaLog').focus();
                    }
                }

                function autoKont(id) {
                    var e = document.getElementById(id);
                    if(e.style.display == 'block'){
                        e.style.display = 'none';
                    }
                    else{
                        e.style.display = 'block';
                        document.getElementById('erabiltzailea').focus();
                    }
                }

                function kendu(id) {
                    var e = document.getElementById(id);
                
                    e.style.display = 'none';
                
                }
                
                function logout(){
                    location.href="logout.php";
                }

                function perfil(user){
                    if(user=="Admin"){
                        location.href="admin.php";
                    }else{
                        location.href="perfil.php";
                    }
                }

        </script>

        <title>Sidreguia.tk</title>

</head>
<body>

    <h1 id="titulo">SidreGuia</h1>

    <!-- MENU --> 

     <header id="registro">
        <div class="container">
        <img id="logo" src="img/logo.png"/>
            <ul id="nav">
                <li><img src="img/inicio.png" class="imgMenu" /><a href="index.php">Inicio</a></li>
                <li><img src="img/logoIcon.png" class="imgMenu" /><a href="#s1">Sidrerias</a>
                    <span id="s1"></span>
                    <ul class="subs">
                        <li><a href="#" id="arab">Alava<img id="araba" src="img/araba.png" /></a></li>
                        <li><a href="#" id="bizka">Vizcaia<img id="bizkaia" src="img/bizkaia.png" /></a></li>
                        <li><a href="#" id="giputxi">Guipuzcoa<img id="gipuzkoa" src="img/gipuzkoa.png" /></a></li>
                        <li><a href="#" id="nafar">Navarra<img id="nafarroa" src="img/nafarroa.png" /></a></li>
                        <li><a href="#" id="ipar">Iparralde<img id="iparralde" src="img/iparralde.png" /></a></li>
                    </ul>
                </li>
                <?php 
                    if (!isset($_SESSION["user"])){ 
                ?>
                    <li>
                       <img src="img/login.png" class="imgMenu" /><a id="sartu" href="#" onclick="autoLog('log'); kendu('reg')">Inicio sesión</a>
                    </li> 
                    <li>
                       <img src="img/addUsuario.png" class="imgMenu"/><a id="regis" href="#" onclick="autoKont('reg'); kendu('log')">Registrarse</a>
                    </li>                 
                <?php }
                    else{ ?>    
                    <li>
                       <img src="img/usuario.png" class="imgMenu" /><a id="user" href="#" onclick="perfil('<?php echo $_SESSION["user"]; ?>');">Hola, <ins><?php echo $_SESSION["user"]; ?></ins></a>
                    </li>
                    <li>
                        <img src="img/logout.png" class="imgMenu" /><a id="itxi" href="#" onclick="logout();">Cerrar sesión</a>
                    </li>
                <?php } ?>
            </ul>
                <div id="hizkuntzak">
                    <li><a href="index.php">eu</a></li>
                    <li>|</li>
                    <li><a href="index_esp.php">es</a></li>
                </div>
            
        </ul>
        </div>

    </header>

<!-- WEB -->
        <img id="fondo" src="img/slide.jpg" alt="background" href="#"/>
        <div id="reg">              
            <form class="form-3" action="registro.php" method="post" >
                    <div>
                        <label for="erabiltzailea" style="padding: 10px 0px 2px 0px;"><font color="white">Usuario</font></label>
                        <input type="text" name="erabiltzailea" id="erabiltzailea" required title="Sartu erabiltzaile izena">
                    </div>
                    <div>
                        <label for="pasahitza" style="padding: 15px 0px 2px 0px;"><font color="white">Contraseña</font></label>
                        <input type="password" name="pasahitza" id="pasahitza" required title="Sartu pasahitza">
                    </div>
                    <div>
                        <label for="email" style="padding: 15px 0px 2px 0px;"><font color="white">Email</font></label>
                        <input type="text" name="email" id="email" class="required email" title="aaa@bbb.com" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" oninvalid="setCustomValidity('Formatu desegokia ')" onchange="try{setCustomValidity('')}catch(e){}" required>
                    </div>
                    <div>
                        <label for="izena" style="padding: 15px 0px 2px 0px;"><font color="white">Nombre</font></label>
                        <input type="text" name="izena" id="izena" required title="Sartu zure izena" pattern="[a-zA-Z]+" oninvalid="setCustomValidity('Ezin dira zenbakiak sartu ')" onchange="try{setCustomValidity('')}catch(e){}">
                    </div>
                    <div>
                        <label for="abizena" style="padding: 15px 0px 2px 0px;"><font color="white">Apellido</font></label>
                        <input type="text" name="abizena" id="abizena" required title="Sartu zure abizena" pattern="[a-zA-Z]+" oninvalid="setCustomValidity('Ezin dira zenbakiak sartu ')" onchange="try{setCustomValidity('')}catch(e){}">
                    </div>
                    <div>
                        <label for="kodea" style="padding: 15px 0px 2px 0px;"><font color="white">Escriba el código secreto: <span id="secret"></span> (<a href="#" class="refresh">cambiar</a>)</font></label>
                        <input type="text" name="kodea" id="kodea" required class="required antispam" maxlength="6" minlength="6" title="Sartu ikusten duzun kodea">
                    </div>
                    <div class="submit">
                        <input type="submit" value="Erregistratu">
                    </div>                
            </form>
        </div>  
        <div id="log">              
            <form class="form-4" action="" method="post"> 
                   
                <label for="erabiltzailea" style="padding: 10px 0px 2px 0px;"><font color="white">Usuario</font></label>
                <input type="text" name="erabiltzaileaLog" id="erabiltzaileaLog" title="Sartu erabiltzaile izena" />
                    
                    
                <label for="pasahitza" style="padding: 15px 0px 2px 0px;"><font color="white">Contraseña</font></label>
                <input type="password" name="pasahitzaLog" id="pasahitzaLog" title="Sartu pasahitza" />
                   
                <font color="red"><div id="aviso"></div></font></br>
                    
                <input type="button" value="Sartu" id="butsartu" />
            </form>
        </div>

        <div id="subtitulo"><h2>Toda la información de tus sidrerias favoritas en un solo click</h2></div>
        <div id="bilatu">
            <form class="bilatzailea" >
                 <input class="bilaketa" id="sagardotegia" name="sagardotegia" type="text" value="Sidreria..." onfocus="if (this.value == 'Sidreria...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Sidreria...';}" results="5" autocomplete="on" onclick="kendu('log'); kendu('reg');" />
                
                 <input class="bilaketaBotoia" id="bilaketa" type="button" value="IR" />
            </form>
        </div>
        
        <!-- REPRODUCTOR DE VIDEO -->


        <h1 id="iniTxotx">Inicio de la temporada TXOTX 2015!!</h1>
        
        <div id="btnPlay">
            
            <a href="#" id="butPlay"><img src="img/logoPlay.png" /></a>

        </div>

        <div id='media-player'>
            <video id='media-video' controls>
                <source src='https://dl.dropboxusercontent.com/u/31412543/VID-20150119-WA0005.mp4' type='video/mp4'>
            </video>
            <div id='media-controls'>
                <progress id='progress-bar' min='0' max='100' value='0'>0% played</progress>
                <button id='replay-button' class='replay' title='replay' onclick='replayMedia();'>Replay</button>   
                <button id='play-pause-button' class='play' title='play' onclick='togglePlayPause();'>Play</button>
                <button id='stop-button' class='stop' title='stop' onclick='stopPlayer();'>Stop</button>
                <button id='volume-inc-button' class='volume-plus' title='increase volume' onclick='changeVolume("+");'>Subir volumen</button>
                <button id='volume-dec-button' class='volume-minus' title='decrease volume' onclick='changeVolume("-");'>Bajar volumen</button>
                <button id='mute-button' class='mute' title='mute' onclick='toggleMute("true");'>Mute</button>  
                <p id="start"></p>
            </div>
        </div>  
       
        <footer id="footer" onclick="kendu('log'); kendu('reg');">
            <div id="autores">
                Copyleft Aritz Etxegia, Rubén Aparicio y Lander Reyes 2014 / 2015
            </div>
            <div id="redSocial"> 
                <a href="http://www.facebook.com/sagardotegida"><img src="img/facebook.png" id="face" /></a>
                <a href="https://www.twitter.com/SagardoteGida"><img src="img/twitter.png" id="twit" /></a>
                <a href="https://www.youtube.com/channel/UCoDkOZgVVDrDJSpgUptF5Gw/feed"><img src="img/youtube.png" id="yout" /></a>
                <a href="https://plus.google.com/u/0/105399675361069810113/posts"><img src="img/google+.png" id="goog" /></a>
                <a href="https://instagram.com/sagardotegida"><img src="img/instagram.png" id="inst" /></a>
            </div>
            <img src="img/info.png" id="info" />
            <div id="about">
               Contacto
            </div>
            

        </footer>
        </nav>

</body>

 <script type="text/javascript">

    $(document).ready(function(){      
    
        $("#enviarT").click(function(mievento) {
            $.ajax({
                type: 'GET',
                url: "http://localhost/Txotx/respuestaApiUsuarios.php",
                dataType: "json",
                success: function(data) {
                    var datos ={
                        user: data.user
                    };
                    
                    //Compilamos el template:
                    var source   = $("#entry-template2").html();
                    var template = Handlebars.compile(source);    
                    var user = template(datos);
                    $("#contenido2").html(user);
                }
            });
        });

        $("#giputxi").click(function(){

            document.location.href="zerrenda.php?probintzia=1";

        });

        $("#bizka").click(function(){
           
            document.location.href="zerrenda.php?probintzia=2";
            
        });

        $("#nafar").click(function(){
            
            document.location.href="zerrenda.php?probintzia=3";
            
        });

        $("#arab").click(function(){
           
            document.location.href="zerrenda.php?probintzia=4";
          
        });

        $("#ipar").click(function(){
           
            document.location.href="zerrenda.php?probintzia=5";
          
        });
        $("#bilaketa").click(function(){
            var sagardotegia=$("#sagardotegia").val();
            if(sagardotegia==""){
               
            }else if(sagardotegia=="Sagardotegia..."){

            }else{
                document.location.href="zerrendaSagardo.php?Sagardotegia="+sagardotegia;
            }
            
        });

    });

</script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_es.js "></script>
    
<script type="text/javascript">

    $(document).ready(function(){

        /* VALIDAR LOGIN */

            /* VALIDAR LOGIN */
        $("#butsartu").click(function(evento){
            evento.preventDefault();
            if($("#erabiltzaileaLog").val()=="" && $("#pasahitzaLog").val()==""){
                $("#aviso").text("Ezin dira hutsik egon");
            }else{
                $("#aviso").load("login.php", {user: $("#erabiltzaileaLog").val(), pass: $("#pasahitzaLog").val()}, function(response){
                    if(response==""){
                        location.reload();
                    }else{
                        $("#aviso").text(response);
                    }
                });
            }
        });
    
/* CREAR NUMERO SECRETO RANDOM */
    function randomgen()
    {
        var rannumber='';
        for(ranNum=1; ranNum<=6; ranNum++){
            rannumber+=Math.floor(Math.random()*10).toString();
        }
        $('#secret').text(rannumber);
    }

        if ($("#secret")) randomgen();
        
        $(".refresh").bind("click",function(e){ e.preventDefault();randomgen(); })
        
        $.validator.addMethod("antispam", function(antispam) 
        {
            if ( antispam==$("#secret").text() ) return true;
        });
  
    });


    /*  API PARA VALIDAR FORMULARIO DE REGISTRO  */

        function iniciar(){
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

        window.addEventListener("load", iniciar, false);

    </script>

    

   <script type="text/javascript">

        $(document).ready(function (){

            document.getElementById("media-video").addEventListener("ended", function(){
                $("#media-player").animate({"top": "50%"}, "slow");

                $('#media-video').css({ 'width':'305px', 'height':'160px' });
                $('#progress-bar').css({ 'width':'172px'});

                $("#media-player").animate({"left": "145%"}, "slow");
            },false);


            $('#butPlay').click(function(){
               
                $("#media-player").animate({"left": "38%"}, "slow");
                
            }); 
               
            $('.play').click(function(){

                $("#media-player").animate({"top": "20%"}, "slow");
                $('#media-player').animate({"left": "25%"}, "slow");

                $('#media-video').css({ 'width':'750px', 'height':'425px' });
                $('#progress-bar').css({ 'width':'625px'});

               // terminado();

            });

            $('.stop').click(function(){
                
                $("#media-player").animate({"top": "50%"}, "slow");

                $('#media-video').css({ 'width':'305px', 'height':'160px' });
                $('#progress-bar').css({ 'width':'172px'});

                $("#media-player").animate({"left": "145%"}, "slow");

            });

        });

    </script>

<html>