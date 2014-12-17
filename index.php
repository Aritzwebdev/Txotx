<?php 
 session_start();
?>
<html>
<head>
	<link rel="stylesheet" href="index.css"/>
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
	</script>
</head>
<body>
	<header id="registro">
		<ul id="hizkuntzak">
			<li><a href="">eu</a></li>
			<li>|<?php echo $_SESSION["user"]; ?></li>
			<li><a href="">es</a></li>
		</ul>
		<ul id="top_header">
		<!--<?php 
			if ($_SESSION["user"]!=""){ 
		?>
			<li><a id="user" href="#"><?php echo $_SESSION["user"]; ?></a></li>
			<li>
			<a id="sartu" href="#" onclick="cerrarsesion.php">Saioa itxi</a>
			</li>
					
		<?php }
			else{ ?>-->
			
			<li><a id="regis" href="#" onclick="auto('reg'); kendu('log')">Kontua sortu</a></li>
			<li>
			<a id="sartu" href="#" onclick="auto('log'); kendu('reg')">Saioa hasi</a>
			</li>				
			<!--<?php } ?>-->
			<li><a href="">Sagardotegiak</a></li>
			<li><a href="index.html">Hasiera</a></li>
		</ul>
		
				
				 	
	</header>
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
	<div id="bilatu">
		<form action="bilatu.php" method="get">
			<input id="bilaketa" type="text" name="herria" placeholder="Herria" onclick="kendu('log'); kendu('reg');">
			<input id="bilaketa_botoia" type="submit" value="Bilatu"> 
		</form>
	</div>
	<footer id="footer">
				Copyleft Ruben Aparicio, Lander Reyes eta Aritz Etxegia 2014
	</footer>
	</nav>
</body>
<html>
