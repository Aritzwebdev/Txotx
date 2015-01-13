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
        <script type="text/javascript" language="javascript" src="js/api.js"></script>

        <link rel="stylesheet" href="css/index.css" />
        <link rel="stylesheet" href="css/menu.css" media="screen, projection"/>

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

    <img id="logo" src="img/logo.png"/>

    <!-- MENU --> 
        <header id="registro">  
        <ul class="dropdown">
                <li><a href="index.php">Hasiera</a></li>
                <li><a href="">Sagardotegiak</a>
                    <ul class="sub_menu">
                        <li><a href="#">Gipuzkoa</a>
                            <ul>
                                <li><a href="#">Hernani</a>
                                    <ul class="sub_menu">
                                        <li><a href="">Rufino</a></li>
                                        <li><a href="">Itxasburu</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Oiartzun</a>
                                    <ul class="sub_menu">
                                        <li><a href="http://localhost/Txotx/sagardotegia.php?herria=oiartzun&izena=Baleio">Baleio</a></li>
                                        <li><a href="">Ordo-zelai</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Astigarraga</a>
                                    <ul class="sub_menu">
                                        <li><a href="">Alguna</a></li>
                                        <li><a href="">Fijo</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#">Bizkaia</a>
                            <ul>
                                <li><a href="#">Bilbao</a>
                                    <ul class="sub_menu">
                                        <li><a href="">Nose</a></li>
                                        <li><a href="">Pase</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Getxo</a>
                                    <ul class="sub_menu">
                                        <li><a href="">Pos</a></li>
                                        <li><a href="">Alao</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#">Araba</a>
                            <ul>
                                <li><a href="#">Gazteiz</a>
                                    <ul class="sub_menu">
                                        <li><a href="">Iepa </a></li>
                                        <li><a href="">Pues</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#">Nafarroa</a>
                            <ul>
                                <li><a href="#">Pamplona</a>
                                    <ul class="sub_menu">
                                        <li><a href="">aupa</a></li>
                                        <li><a href="">lahostia</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#">Iparralde</a>
                            <ul>
                                <li><a href="#">Francia</a>
                                    <ul class="sub_menu">
                                        <li><a href="">Gabaxo1</a></li>
                                        <li><a href="">Gabaxo2</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
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
                       <a id="user" href="#" onclick="perfil();"><?php echo $_SESSION["user"]; ?></a>
                    </li>
                    <li>
                        <a id="sartu" href="#" onclick="logout();">Saioa itxi</a>
                    </li>
                <?php } ?>
        </ul>  
        <ul id="hizkuntzak">
            <li><a href="">eu</a></li>
            <li>|</li>
            <li><a href="">es</a></li>
        </ul>
        </header>

<!-- WEB -->
        <img id="fondo" src="img/txotx.jpg" alt="background" href="#"/>
        <h1 id="titulo">SagardoteGida</h1>
        <div id="reg">              
            <form class="form-3" action="registro.php" method="post" >
                    <!--<label id="erabiltzaile"></label>-->

                    <label for="izena">Izena</label>
                    <input type="text" name="izena" placeholder="Izena">
                
                    <label for="abizena">Abizena</label>
                    <input type="text" name="abizena" placeholder="Abizena">

                    <label for="email">Email-a</label>
                    <input type="text" name="email" placeholder="Email-a"> 

                    <label for="login">Erabiltzailea</label>
                    <input type="text" name="user" placeholder="Erabiltzailea">
                
                    <label for="password">Pasahitza</label>
                    <input type="password" name="pass" placeholder="Pasahitza"> 
                
                    <input type="submit" value="Kontua sortu">                
            </form>
        </div>  
        <div id="log">              
            <form class="form-3" action="login.php" method="post">          
                    <label for="login">Erabiltzailea</label>
                    <input type="text" name="user" placeholder="Erabiltzailea">
                
                    <label for="password">Pasahitza</label>
                    <input type="password" name="pass" placeholder="Pasahitza"> 
                
                    <input type="submit" value="Sartu">               
            </form>
        </div>
        <div id="subtitulo"><h2>Zure sagardotegi gogokoenaren informazioa klik batean!</h2></div>
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
                    url: "http://localhost/Txotx/respuestaApi.php",
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

<html>