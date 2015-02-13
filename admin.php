<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8"/>
       	<meta content="width=device-width, height=device-height, initial-scale=1.0" name="viewport" />
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>  <!--/*http://code.jquery.com/jquery-2.1.0.min.js-->     
        <script type="text/javascript" language="javascript" src="js/jquery.dropdownPlain.js"></script>
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   		<script src="js/menuAdmin.js"></script>
		<script type="text/javascript" src="js/admin.js"></script>
		
        <link rel="stylesheet" href="css/menu.css" />
        <link rel="stylesheet" href="css/menuAdmin.css" media="screen, projection"/>
        <link rel="stylesheet" href="css/tabla.css" />
        <link rel="stylesheet" href="css/admin.css" />

        <title>Sagardotegida.tk/Administrador</title>

</head>
<body>

    <img id="logo" src="img/logo.png" />
    <h1 id="titulo">SagardoteGida</h1>

    <!-- MENU --> 

     <header id="registro">
        <div class="container">
            <div id='cssmenu' class="align-center">
        		<ul>
                    <li class="men"><a href="index.php"><img src="img/inicio.png" class="imgMenu" />Hasiera</a></li>
           			<li class="active"><a href="#s"><img src="img/logoIcon.png" class="imgMenu" />Sagardotegiak</a>
              			<ul>
                 			<li><a href="#" id="anadirSagardotegi"><img src="img/mas.png" class="imgMenu" />Gehitu</a></li>
                 			<li><a href="#" id="borrarSagardotegi"><img src="img/menos.png" class="imgMenu" />Ezabatu</a></li>
              			</ul>
           			</li>
        		  	<li class="men1"><a href="#" id="borrarUsuarios"><img src="img/usuario.png" class="imgMenu" />Erabiltzaileak</a></li>
        		  	<li class="men"><a href="#" id="borrarComentarios"><img src="img/iruzkinak.png" class="imgMenu" />Iruzkinak</a></li>
                <?php 
                    if (isset($_SESSION["user"])){ 
                ?>   
                    <li class="men">
                        <a id="itxi" href="#" onclick="logout();"><img src="img/logout.png" class="imgMenu" />Saioa itxi</a>
                    </li>
                <?php } ?>
        		</ul>
        	</div>
        </div>
    </header>

<!-- WEB -->
        <img id="fondo" src="img/slide.jpg" alt="background" href="#"/>
           
        <div id="borrar">  
        	<?php include 'tablaSagardotegis.php';?>
        </div> 
        
        <div id="anadir">

        <form class="agregarSagardotegis" action="anadirSagardotegi.php" method="post" >
            <table>
                <th>Izena</th>
                <th>Helbidea</th>
                <th>Herria</th>
                <th>Probintzia</th>
                <th>Telefonoa</th>
                <th>Email-a</th>
                <th>Web-a</th>
                <tr>
                    <td><input type="text" name="izena" id="izena" required title="Sartu izena"></td>
                    <td><input type="text" name="helbidea" id="helbidea" required title="Sartu helbidea"/></td>
                    <td><input type="text" name="herria" id="herria" required title="Sartu herria" pattern="[0-9]+" oninvalid="setCustomValidity('zenbakiak sartu ')" onchange="try{setCustomValidity('')}catch(e){}"></td>
                    <td><input type="text" name="probintzia" id="probintzia" required title="Sartu probintzia" pattern="[0-9]+" oninvalid="setCustomValidity('zenbakiak sartu ')" onchange="try{setCustomValidity('')}catch(e){}" /></td>
                    <td><input type="text" name="telefonoa" id="telefonoa" required title="Sartu telefonoa" pattern="[0-9]+" oninvalid="setCustomValidity('zenbakiak sartu ')" onchange="try{setCustomValidity('')}catch(e){}" /></td>
                    <td><input type="text" name="email" id="email" class="required email" title="aaa@bbb.com" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" oninvalid="setCustomValidity('Formatu desegokia ')" onchange="try{setCustomValidity('')}catch(e){}" required></td>
                    <td><input type="text" name="web" required/></td>
                </tr>
            </table>
            <input type="submit" id="bidali" name="anadirSagardotegi" value="Bidali"/>
        </form>
    </div>
        
        <div id="usuarios">
        	<?php include 'tablaErabiltzaileak.php';?>
        </div>
        
        <div id="comentarios">
        	<?php include 'tablaIruzkinak.php';?>
        </div>
        
        <img id="log" src="img/logo.png"/>
        <div id="subtitulo"><h2>Panel Administrador</h2></div>
       
       <footer id="footer" onclick="kendu('log'); kendu('reg');">

            <img src="img/copyleft.png" id="copyleft" />
            <div id="autores" title="Copyleft Aritz Etxegia, Rubén Aparicio y Lander Reyes 2014 / 2015">
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


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_es.js "></script>
    
</body>
<html>