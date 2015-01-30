<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
       	<meta content="width=device-width, height=device-height, initial-scale=1.0" name="viewport" />
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>  <!--/*http://code.jquery.com/jquery-2.1.0.min.js-->     
        <script type="text/javascript" language="javascript" src="js/jquery.dropdownPlain.js"></script>
		<script type="text/javascript" src="js/admin.js"></script>
		
        <link rel="stylesheet" href="css/menu.css" media="screen, projection"/>
        <link rel="stylesheet" href="css/tabla.css" />
        <link rel="stylesheet" href="css/admin.css" />
		
        

        

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
        	<?php include 'tablaSagardotegis.php';?>
        </div> 
        
        <div id="anadir">
           <form class="form-4" action="anadirSagardotegi.php" method="post" >
                    <div>
                        <label for="izena" style="padding: 10px 0px 2px 0px;"><font color="white">Izena</font></label>
                        <input type="text" name="izena" id="izena" required title="Sartu sagardotegiaren izena">
                    </div>
                    <div>
                        <label for="herria" style="padding: 15px 0px 2px 0px;"><font color="white">Herria</font></label>
                        <input type="text" name="herria" id="herria" required title="Sartu herria" pattern="[a-zA-Z]+" oninvalid="setCustomValidity('Ezin dira zenbakiak sartu ')" onchange="try{setCustomValidity('')}catch(e){}">
                    </div>
                    <div>
                        <label for ="deskribapena" style="padding: 15px 0px 2px 0px;"><font color="white">Deskribapena</font></label>
                        <input type="text" name="deskribapena" id="deskribapena" required title="Sartu deskribapena">
                    </div>
                    <div>
                        <label for="probintzia" style="padding: 15px 0px 2px 0px;"><font color="white">Probintzia</font></label>
                        <input type="text" name="probintzia" id="probintzia" required title="Sartu probintzia" pattern="[a-zA-Z]+" oninvalid="setCustomValidity('Ezin dira zenbakiak sartu ')" onchange="try{setCustomValidity('')}catch(e){}">
                    </div>
                    <div>
                        <label for="telefonoa" style="padding: 15px 0px 2px 0px;"><font color="white">Telefonoa</font></label>
                        <input type="text" name="telefonoa" id="telefonoa" required title="Sartu Telefonoa" pattern="[0-9]{9}" oninvalid="setCustomValidity('Zenbakiak bakarrik(9 zenbaki)')" onchange="try{setCustomValidity('')}catch(e){}">
                    </div>
                    <div>
                        <label for="email" style="padding: 15px 0px 2px 0px;"><font color="white">Emaila</font></label>
                        <input type="text" name="email" id="email" class="required email" title="aaa@bbb.com" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" oninvalid="setCustomValidity('Formatu desegokia ')" onchange="try{setCustomValidity('')}catch(e){}" required>
                    </div>
                    <div class="submit">
                        <input type="submit" name="anadirSagardotegi" value="Gehitu">
                    </div>                
            </form>
        </div> 
        
        <div id="usuarios">
        	<?php include 'tablaErabiltzaileak.php';?>
        </div>
        
        <div id="comentarios">
        	<?php include 'tablaIruzkinak.php';?>
        </div>
        
        <div id="subtitulo"><h2>Panel Administrador</h2></div>
       
        <footer id="footer">
                                Copyleft Aritz Etxegia, Rubén Aparicio y Lander Reyes 2014 / 2015
        </footer>




    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_es.js "></script>
    
</body>
<html>