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
        <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/md5.js"></script>
        
        <script type="text/javascript" language="javascript" src="js/apiUsers.js"></script>
        <script src="js/index.js"></script>

        <link rel="stylesheet" href="css/menu.css" media="screen, projection"/>
        <link rel="stylesheet" href="css/index.css" />

        <link href='css/media-player.css' rel='stylesheet' />
        <script src='js/media-player.js'></script>       

</head>
<body>

    <h1 id="titulo">SagardoteGida</h1>

    <!-- MENU --> 

     <header id="registro">
        <div class="container">
        <img id="logo" src="img/logo.png"/>
            <ul id="nav">
                <li><img src="img/inicio.png" class="imgMenu" /><a href="index.php">Hasiera</a></li>
                <li><img src="img/logoIcon.png" class="imgMenu" /><a href="#s1">Sagardotegiak</a>
                    <span id="s1"></span>
                    <ul class="subs">
                        <li><a href="#" id="arab">Araba<img id="araba" src="img/araba.png" /></a></li>
                        <li><a href="#" id="bizka">Bizkaia<img id="bizkaia" src="img/bizkaia.png" /></a></li>
                        <li><a href="#" id="giputxi">Gipuzkoa<img id="gipuzkoa" src="img/gipuzkoa.png" /></a></li>
                        <li><a href="#" id="nafar">Nafarroa<img id="nafarroa" src="img/nafarroa.png" /></a></li>
                        <li><a href="#" id="ipar">Iparralde<img id="iparralde" src="img/iparralde.png" /></a></li>
                    </ul>
                </li>
                <?php 
                    if (!isset($_SESSION["user"])){ 
                ?>
                    <li>
                       <img src="img/login.png" class="imgMenu" /><a id="sartu" href="#" onclick="autoLog('log'); kendu('reg')">Saioa hasi</a>
                    </li> 
                    <li>
                       <img src="img/addUsuario.png" class="imgMenu"/><a id="regis" href="#" onclick="autoKont('reg'); kendu('log')">Kontua sortu</a>
                    </li>                 
                <?php }
                    else{ ?>    
                    <li>
                       <img src="img/usuario.png" class="imgMenu" /><a id="user" href="#" >Kaixo, <ins><?php echo $_SESSION["user"]; ?></ins></a>
                    </li>
                    <li>
                        <img src="img/logout.png" class="imgMenu" /><a id="itxi" href="#" >Saioa itxi</a>
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
                <input type="text" name="erabiltzaileaLog" id="erabiltzaileaLog" title="Sartu erabiltzaile izena" />
                    
                    
                <label for="pasahitza" style="padding: 15px 0px 2px 0px;"><font color="white">Pasahitza</font></label>
                <input type="password" name="pasahitzaLog" id="pasahitzaLog" title="Sartu pasahitza" />
                   
                <font color="red"><div id="aviso"></div></font></br>
                    
                <input type="button" value="Sartu" id="butsartu" />
            </form>
        </div>

        <div id="subtitulo"><h2>Zure gustoko sagardotegiaren informazioa klik batera</h2></div>
        <div id="bilatu">
            <form class="bilatzailea" >
                 <input class="bilaketa" id="sagardotegia" name="sagardotegia" type="text" value="Sagardotegia..." onfocus="if (this.value == 'Sagardotegia...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Sagardotegia...';}" results="5" autocomplete="on" onclick="kendu('log'); kendu('reg');" />
                
                 <input class="bilaketaBotoia" id="bilaketa" type="button" value="Bilatu" />
            </form>
        </div>
        
        <!-- REPRODUCTOR DE VIDEO -->


        <h1 id="iniTxotx">TXOTX 2015, denboraldiaren hasiera!!</h1>
        
        <div id="btnPlay">
            
            <a href="#" id="butPlay"><img src="img/logoPlay.png" /></a>

        </div>

        <div id='media-player'>
            <video id='media-video' controls>
                <source src='https://dl.dropboxusercontent.com/u/31412543/VID-20150119-WA0005.mp4' type='video/mp4'>
            </video>
            <div id='media-controls'>
                <progress id='progress-bar' min='0' max='100' value='0'>0% played</progress>
                <button id='replay-button' class='replay' title='Berrikusi' onclick='replayMedia();'>Replay</button>   
                <button id='play-pause-button' class='play' title='Abiarazi' onclick='togglePlayPause();'>Play</button>
                <button id='stop-button' class='stop' title='Gelditu' onclick='stopPlayer();'>Stop</button>
                <button id='volume-inc-button' class='volume-plus' title='Ahotsa igo' onclick='changeVolume("+");'>Increase volume</button>
                <button id='volume-dec-button' class='volume-minus' title='Ahotsa jaitsi' onclick='changeVolume("-");'>Decrease volume</button>
                <button id='mute-button' class='mute' title='Ahotsa kendu' onclick='toggleMute("true");'>Mute</button>  
                <p id="start"></p>
            </div>
        </div>  
       
        <footer id="footer" onclick="kendu('log'); kendu('reg');">
            <div id="autores">
                Copyleft Aritz Etxegia, Rubén Aparicio y Lander Reyes 2014 / 2015
            </div>
            <div id="redSocial"> 
                <a href="http://www.facebook.com/sagardotegida" target="_blank"><img src="img/facebook.png" id="face" /></a>
                <a href="https://www.twitter.com/SagardoteGida" target="_blank"><img src="img/twitter.png" id="twit" /></a>
                <a href="https://www.youtube.com/channel/UCoDkOZgVVDrDJSpgUptF5Gw/feed" target="_blank"><img src="img/youtube.png" id="yout" /></a>
                <a href="https://plus.google.com/u/0/105399675361069810113/posts" target="_blank"><img src="img/google+.png" id="goog" /></a>
                <a href="https://instagram.com/sagardotegida" target="_blank"><img src="img/instagram.png" id="inst" /></a>
            </div>
            <img src="img/info.png" id="info" />
            <div id="about">
            Kontaktua
            </div>
            

        </footer>
        </nav>

</body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_es.js "></script>
<html>