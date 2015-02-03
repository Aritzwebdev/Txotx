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
    <script type="text/javascript" src="http://builds.handlebarsjs.com.s3.amazonaws.com/handlebars-v2.0.0.js"></script>
    <!--<script type="text/javascript" language="javascript" src="js/api.js"></script>-->

	<link rel="stylesheet" href="css/perfil.css"/>	
	<link rel="stylesheet" href="css/menuPerfil.css" media="screen, projection"/>
	



	<script type="text/javascript">
		
		function logout(){
            location.href="logout.php";
        }

        //funcion para darse de baja
        function baja(){
        		var baja=confirm ("Erabiltzailea ezabatu nahi duzu?");
        		if(baja){
        			location.href = "baja.php";
        		}
        };
	</script>
</head>
<body>
<div class="foo">

	<h1 id="userPerfil"><ins><?php echo $_SESSION["user"]; ?></ins></h1>

	<header id="registro">
	        <div class="container"> 	
	            <ul id="nav">
	                <li><a href="index.php">Hasiera</a></li>
	                <li><a href="#" id="datu">Datuak</a></li>
				    <li><a href="#" id="cambiopass">Pasahitza aldatu</a></li>
				    <li><a href="#" id="iruzkin">Iruzkinak</a></li>
				    <li><a href="#" onclick="baja()" id="elimUsu">Erabiltzailea ezabatu</a></li>
	                <li>
	                    <a id="itxi" href="#" onclick="logout();">Saioa itxi</a>
	                </li>
	            </ul>
	            <ul id="hizkuntzak">
	            <li><a href="">eu</a></li>
	            <li>|</li>
	            <li><a href="">es</a></li>
	        </div>

	    </header>

	<div id="datuak">
	<?php

	if($row=mysqli_fetch_array($result)){
	?>
	<form action="modificarUsuario.php" method="post">
	<table>
		<tr>
			<td>Erabiltzailea: </td><td><input type="text" name="erabiltzailea" value="<?php echo $row['erabiltzailea']; ?>" /></td>
			<td></td>
			<td>Izena: </td><td><input type="text" name="izena" value="<?php echo $row['izena']; ?>" /></td>
		</tr>
		<br><br>
		<tr>
			<td>Abizena: </td><td><input type="text" name="abizena" value="<?php echo $row['abizena']; ?>" /></td>
			<td></td>
			<td>Email-a: </td><td><input type="text" name="email" value="<?php echo $row['email']; ?>" /></td>
		</tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="submit" id="butdatuak" name="butdatuak" value="Datuak Aldatu"/></td>
			<td></td>
			<td></td>
		</tr>
	</table>
	</form>
	<?php
	}
	?>
	</div>

		<div id="pass">
	        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	        <table>
	            <tr>
	            	<td><label>Pasahitza:</label></td>
	 				<td></td>
	            	<td><input type="password" name="viejoPass" maxlength="15" /></td>
	            </tr>
	            <tr>
	            	<td><label>Pasahitz berria:</label></td>
	 				<td></td>
	            	<td><input type="password" name="pass" maxlength="15" /></td>
	 			</tr>
	 			<tr>
	            	<td><label>Pasahitz berria konfirmatu:</label></td>
	 				<td></td>
	            	<td><input type="password" name="passConfirmado" maxlength="15" /></td>
	 			</tr>
	 			<tr></tr>
	 			<tr></tr>
	 			<tr>
	            	<td></td><td><input type="submit" name="cambiar" value="Aldatu" /></td>
	            </tr>
	        </table>
	        </form>
	   </div>     
	   <div><p id="errorea"></p></div>

		<!-- CAMBIAR CONTRASEÑA -->
	<?php
	    
	    if(isset($_SESSION['user'])) { // comprobamos que la sesión esté iniciada
	        if(isset($_POST['cambiar'])) {
	            if($_POST['pass'] != $_POST['passConfirmado']) {
	                echo "Las contraseñas ingresadas no coinciden. <a href='javascript:history.back();'>Reintentar</a>";
	            }else {
	                $user= $_SESSION['user'];
	                $passViejo = md5($_POST["viejoPass"]);
	                $pass = md5($_POST["pass"]);
	                
	                if($passViejo == $row['pasahitza']){
	                	 if($passViejo == $pass){
		                	
		                	?><script text/javascript>
		                		errorea.innerHTML = "Pasahitz zaharra eta berriak ezin dira berdinak izan. <a href='javascript:history.back();'>Reintentar</a>";
		                		          		
		                	</script>
		                <?php
		                	
		                }else if ($passViejo!=$row['pasahitza']){
		                	
		                	?><script text/javascript>
		                		errorea.innerHTML = "Zure pasahitza idatzi <a href='javascript:history.back();'>Reintentar</a>";
		                	</script>
		                	<?php
		                
		                }else{
		                	$sql = "UPDATE erabiltzaileak SET pasahitza='".$pass."' WHERE erabiltzailea='".$user."'";
			                $result=mysqli_query($con, $sql);
			                if($result) {
			                   	
			                   	?><script text/javascript>
		                			errorea.innerHTML = "Pasahitza ondo aldatuta";
			                	</script>
			                	<?php

			                }else {

			                	?><script text/javascript>
		                			errorea.innerHTML = "Errorea: ezin izan da pasahitza aldatu. <a href='javascript:history.back();'>Reintentar</a>";
			                	</script>
			                	<?php
			                }
		                }
	                }else{

	                	?><script text/javascript>
		                	errorea.innerHTML = "Zure pasahitz zaharra okerra da. <a href='javascript:history.back();'>Reintentar</a>";
			            </script>
			            <?php
	                }
	               
	            }
	        }
	    }else {
	        header("location:index.php");
	    }
	?> 

	<div class="greenBox">
	<div class="myTable">
		<table class="table-bordered table-striped table-condensed flip-content">
		<form action="borrarComentariosUser.php" method="post">
			<thead class="flip-content">
				<tr>
					<th>Borrar</th>
					<th>Id</th>
					<th>Erabiltzailea</th>
					<th>Iruzkina</th>
					<th>Data</th>
					<th>Sagardotegia</th>
				</tr>
			</thead>
			<tbody>
				<?php 
	include_once 'conectar.php';
	$conexion=conectar();
	// Seleccionar todos los registros 
	$consulta = "SELECT * FROM iruzkinak WHERE erabiltzailea='".$_SESSION["user"]."';";
	$result=mysqli_query($conexion, $consulta);
	while ($registro = mysqli_fetch_row($result)){
		echo "<tr>";
		echo "<td><input type='checkbox' name='iruzkinak[]' value=$registro[0]/></td>";
		foreach($registro  as $valor){
			echo "<td>",$valor,"</td>";
 		}
	}
	mysqli_close($conexion);
?>
				<tr><td colspan=12 align=center><input type="submit" name="borrar" id="btnBorrar" value="Borrar"></td></tr>
			</tbody>
			</form>
		</table>
	</div>

</div>

</div>
	

</body>

<script type="text/javascript">

	$(document).ready(function(){
		$("#datu").click(function(){
			$("#datuak").show();
			$(".greenBox").hide();
			$("#pass").hide();
			$("#lista").hide();
			$("#butiruzkin").hide();
		});
		$("#iruzkin").click(function(){		
			$("#butiruzkin").show();
			$(".greenBox").show();
			$("#datuak").hide();
			$("#pass").hide();
			$("#lista").hide();
		});
		$("#cambiopass").click(function(){
			$("#datuak").hide();
			$(".greenBox").hide();
			$("#butiruzkin").hide();
			$("#pass").show();
			$("#lista").hide();
		});
		$("#butlista").click(function(){
		 	$("#lista").slideToogle("slow");
		});

	 });

	</script>

	<script src="js/jquery.js"></script>
	<script src="js/jquery.backstretch.js"></script>
	
	<script type="text/javascript">
		$.backstretch([
	          "img/txotx.jpg",
	          "img/slide.jpg",
	          "img/sidra.jpg"
	        ], {
	            fade: 750,
	            duration: 4000
	        });
	</script>

</html>