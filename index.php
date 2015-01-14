<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>  <!--/*http://code.jquery.com/jquery-2.1.0.min.js-->     
        <script type="text/javascript" language="javascript" src="js/jquery.dropdownPlain.js"></script>
        <script type="text/javascript" src="http://builds.handlebarsjs.com.s3.amazonaws.com/handlebars-v2.0.0.js"></script>
        <script type="text/javascript" language="javascript" src="js/apiUsers.js"></script>

        <link rel="stylesheet" href="css/menu.css" media="screen, projection"/>
        <link rel="stylesheet" href="css/index.css" />
        

        <script type="text/javascript">
                function auto(id) {
                    var e = document.getElementById(id);
                    if(e.style.display == 'block')
                        e.style.display = 'none';
                    else
                        e.style.display = 'block';
                }

                function kendu(id) {
                    var e = document.getElementById(id);
                
                    e.style.display = 'none';
                
                }
                
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
        <img id="logo" src="img/logo.png"/>
            <ul id="nav">
                <li><a href="home.php">Hasiera</a></li>
                <li><a href="#s1">Sagardotegiak</a>
                    <span id="s1"></span>
                    <ul class="subs">
                        <li><a href="#">Gipuzkoa</a><img src="img/gipuzkoa.png" /></li>
                        <li><a href="#">Bizkaia</a><img src="img/bizkaia.png" /></li>
                        <li><a href="#">Araba</a><img src="img/araba.png" /></li>
                        <li><a href="#">Nafarroa</a><img src="img/nafarroa.png" /></li>
                         <li><a href="#">Iparralde</a><img src="" /></li>
                    </ul>
                </li>
                <?php 
                    if (!isset($_SESSION["user"])){ 
                ?>
                    <li>
                       <a id="sartu" href="#" onclick="auto('log'); kendu('reg')">Saioa hasi</a>
                    </li> 
                    <li>
                       <a id="regis" href="#" onclick="auto('reg'); kendu('log')">Kontua sortu</a>
                    </li>                 
                <?php }
                    else{ ?>    
                    <li>
                       <a id="user" href="#" onclick="perfil();">Kaixo, <ins><?php echo $_SESSION["user"]; ?></ins></a>
                    </li>
                    <li>
                        <a id="itxi" href="#" onclick="logout();">Saioa itxi</a>
                    </li>
                <?php } ?>
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
        <div id="reg">              
            <form class="form-3" action="registro.php" method="post" >
                    <div>
                        <label for="erabiltzailea" style="padding: 10px 0px 2px 0px;"><font color="white">Erabiltzailea</font></label>
                        <input type="text" name="erabiltzailea" id="erabiltzailea" required title="Sartu erabiltzaile izena">
                    </div>
                    <div>
                        <label for="pasahitza" style="padding: 15px 0px 2px 0px;"><font color="white">Pasahitza</font></label>
                        <input type="password" name="pasahitza" id="pasahitza" required title="Sartu pasahitza">
                    </div>
                    <div>
                        <label for="email" style="padding: 15px 0px 2px 0px;"><font color="white">Emaila</font></label>
                        <input type="text" name="email" id="email" class="required email" title="aaa@bbb.com" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" oninvalid="setCustomValidity('Formatu desegokia ')" onchange="try{setCustomValidity('')}catch(e){}" required>
                    </div>
                    <div>
                        <label for="izena" style="padding: 15px 0px 2px 0px;"><font color="white">Izena</font></label>
                        <input type="text" name="izena" id="izena" required title="Sartu zure izena" pattern="[a-zA-Z]+" oninvalid="setCustomValidity('Ezin dira zenbakiak sartu ')" onchange="try{setCustomValidity('')}catch(e){}">
                    </div>
                    <div>
                        <label for="abizena" style="padding: 15px 0px 2px 0px;"><font color="white">Abizena</font></label>
                        <input type="text" name="abizena" id="abizena" required title="Sartu zure abizena" pattern="[a-zA-Z]+" oninvalid="setCustomValidity('Ezin dira zenbakiak sartu ')" onchange="try{setCustomValidity('')}catch(e){}">
                    </div>
                    <div>
                        <label for="kodea" style="padding: 15px 0px 2px 0px;"><font color="white">Kode sekretua idatzi: <span id="secret"></span> (<a href="#" class="refresh">aldatu</a>)</font></label>
                        <input type="text" name="kodea" id="kodea" required class="required antispam" maxlength="6" minlength="6" title="Sartu ikusten duzun kodea">
                    </div>
                    <div class="submit">
                        <input type="submit" value="Erregistratu">
                    </div>                
            </form>
        </div>  
        <div id="log">              
            <form class="form-4" action="" method="post"> 
                   
                <label for="erabiltzailea" style="padding: 10px 0px 2px 0px;"><font color="white">Erabiltzailea</font></label>
                <input type="text" name="erabiltzaileaLog" id="erabiltzaileaLog" title="Sartu erabiltzaile izena" oninvalid="setCustomValidity('Ezin da hutsik utzi')" onchange="try{setCustomValidity('')}catch(e){}" required />
                    
                    
                <label for="pasahitza" style="padding: 15px 0px 2px 0px;"><font color="white">Pasahitza</font></label>
                <input type="password" name="pasahitzaLog" id="pasahitzaLog" title="Sartu pasahitza" oninvalid="setCustomValidity('Ezin da hutsik utzi')" onchange="try{setCustomValidity('')}catch(e){}" required />
                   
                <font color="red"><div id="aviso"></div></font></br>
                    
                <input type="submit" value="Sartu" id="butsartu" />
            </form>
        </div>

        <div id="subtitulo"><h2>Toda la información de tu sidrería favorita en un solo click</h2></div>
        <div id="bilatu">
            <form class="bilatzailea" action="sagardotegia.php" method="GET">
                 <input class="bilaketa" name="sagardotegia" type="text" value="Sagardotegia..." onfocus="if (this.value == 'Sagardotegia...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Sagardotegia...';}" results="5" autocomplete="on" onclick="kendu('log'); kendu('reg');" />
                
                 <input class="bilaketaBotoia" type="submit" value="Bilatu" />
            </form>
        </div>
        <div id="contenido2"><button id="enviarT" >Ver usuarios</button></div>
        <script id="entry-template2" type="text/x-handlebars-template">
            {{#if user}}
                <h1>{{user}} </h1>
            {{else}}
                <h1>no va</h1>
            {{/if}}
            
           
        </script>
       
        <footer id="footer" onclick="kendu('log'); kendu('reg');">
                                Copyleft Aritz Etxegia, Rubén Aparicio y Lander Reyes 2014 / 2015
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

    });

</script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_es.js "></script>
    
<script type="text/javascript">

    $(document).ready(function(){

        /* VALIDAR LOGIN */

            $('#butsartu').click(function(){
                
                var erabiltzailea=$("#erabiltzaileaLog").val();
                var pasahitza=$("#pasahitzaLog").val();
                var dataString = 'erabiltzailea='+erabiltzailea+'&pasahitza='+pasahitza;
                if($.trim(erabiltzailea).length>0 && $.trim(pasahitza).length>0){
                    $.ajax({
                    type: "POST",
                    url: "http://localhost/Txotx/login.php",
                    data: dataString,
                    cache: false,
                        beforeSend: function(){ $("#butsartu").val('Konektatzen...');},
                        success: function(data){
                        
                            if(data){
                                //$("body").load("index.php").hide().fadeIn(1500).delay(6000);
                                //or
                                window.location.href = "index.php";
                            }
                            else{                             
                                 //Shake animation effect.
                                $('#log').shake();
                                $("#butsartu").val('Sartu')
                                $("#aviso").html("<font color='red'>Erabiltzaile edo pasahitz desegokia</font>");
                            }
                        }
                    });

                }else{
                    $("#aviso").html("Ezin da hutsik egon");
                }
                return false;
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

<html>