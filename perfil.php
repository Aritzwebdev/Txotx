<?php
session_start();
include "conectar.php";
$con=conectar();

$sql="SELECT * FROM erabiltzaileak WHERE erabiltzailea='".$_SESSION["user"]."';";
$result=mysqli_query($con, $sql);
?>
<html>
<head>
	<meta charset="utf-8" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>  <!--/*http://code.jquery.com/jquery-2.1.0.min.js-->     
    <script type="text/javascript" language="javascript" src="js/jquery.dropdownPlain.js"></script>
    <script type="text/javascript" src="http://builds.handlebarsjs.com.s3.amazonaws.com/handlebars-v2.0.0.js"></script>
    <script type="text/javascript" language="javascript" src="js/api.js"></script>
	
	<link rel="stylesheet" href="css/menu.css"/>
	<link rel="stylesheet" href="css/perfil.css"/>

	<script type="text/javascript">
		function logout(){
            location.href="logout.php";
        }
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
	</script>
</head>
<body>
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
    <li>
    <a id="logout" href="#" onclick="logout();">Saioa itxi</a>
    </li>
    <li><a href="#" onclick="">Datuak</a></li>
    <li><a href="#" onclick="">Pasahitza aldatu</a></li>
    <li><a href="#" onclick="">Iruzkinak</a></li>
    <li><a href="#" onclick="">Erabiltzailea ezabatu</a></li>
</ul>
</header>
<div id="datuak">
<?php

if($row=mysqli_fetch_array($result)){
	echo $row['iderabiltzaileak']."<br/>"; 
	echo $row['erabiltzailea']."<br/>";
	echo $row['izena']."<br/>";
	echo $row['abizena']."<br/>";
	echo $row['email']."<br/>";
}

$sql="SELECT * FROM iruzkinak WHERE erabiltzailea='".$_SESSION["user"]."';";
$result=mysqli_query($con, $sql);

while($row=mysqli_fetch_array($result)){
	echo $row['erabiltzailea']."<br/>"; 
	echo $row['data']."<br/>";
	echo $row['iruzkina']."<br/>";
	echo $row['sagardotegia']."<br/>";
}
?>