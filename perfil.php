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
    <!--<script type="text/javascript" language="javascript" src="js/api.js"></script>-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	
	<link rel="stylesheet" href="css/menu.css"/>
	<link rel="stylesheet" href="css/perfil.css"/>

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
<header id="registro">
<ul class="dropdown">
    <li><a href="index.php">Hasiera</a></li>
    <li><a href="#" id="butlista">Sagardotegiak</a></li>
    <li><a href="#" id="datu">Datuak</a></li>
    <li><a href="#" id="cambiopass">Pasahitza aldatu</a></li>
    <li><a href="#" id="iruzkin">Iruzkinak</a></li>
    <li><a href="#" onclick="baja()" id="elimUsu">Erabiltzailea ezabatu</a></li>
    <li>
    <a id="logout" href="#" onclick="logout();">Saioa itxi</a>
    </li>
</ul>
</header>

<div id="lista">
	<img src="img/gipuzkoa.png" />	
	<img src="img/bizkaia.png" />
	<img src="img/araba.png" />
	<img src="img/nafarroa.png" />
</div>
<div id="datuak">
<?php

if($row=mysqli_fetch_array($result)){
?>
<table>
	<tr><td>Erabiltzailea: </td><td><input type="text" value="<?php echo $row['erabiltzailea']; ?>" />
	</td><td>Izena: </td><td><input type="text" value="<?php echo $row['izena']; ?>" /></td></tr>
	<br><br>
	<tr><td>Abizena: </td><td><input type="text" value="<?php echo $row['abizena']; ?>" />
	</td><td>Email-a: </td><td><input type="text" value="<?php echo $row['email']; ?>" /></td></tr>
</table>
	<br>
	<input type="button" id="butdatuak" value="Datuak Aldatu"/>
<?php
}
?>
</div>

	<!-- CAMBIAR CONTRASEÑA -->
<?php
    
    if(isset($_SESSION['user'])) { // comprobamos que la sesión esté iniciada
        if(isset($_POST['cambiar'])) {
            if($_POST['pass'] != $_POST['passConfirmado']) {
                echo "Las contraseñas ingresadas no coinciden. <a href='javascript:history.back();'>Reintentar</a>";
            }else {
                $user= $_SESSION['user'];
                $passViejo = $_POST["viejoPass"];
                $pass = $_POST["pass"];
                
                if($passViejo == $row['pasahitza']){
                	 if($passViejo == $pass){
	                	?><script text/javascript>
	                		kk.innerHTML = '<?php echo "kakita" ?>';
	                		          		
	                	</script>
	                <?php
	                	//echo "La contraseña actual no puede ser igual que la utilizada anteriormente <a href='javascript:history.back();'>Reintentar</a>";
	                }else if ($passViejo!=$row['pasahitza']){
	                	echo "Escribe tu contraseña actual <a href='javascript:history.back();'>Reintentar</a>";
	                }else{
	                	$sql = "UPDATE erabiltzaileak SET pasahitza='".$pass."' WHERE erabiltzailea='".$user."'";
		                $result=mysqli_query($con, $sql);
		                if($result) {
		                    echo "Contraseña cambiada correctamente.";
		                }else {
		                    echo "Error: No se pudo cambiar la contraseña. <a href='javascript:history.back();'>Reintentar</a>";
		                }
	                }
                }else{
                	echo "La contraseña actual no coincide, debe de ser la misma que tenia usted antes. <a href='javascript:history.back();'>Reintentar</a>";
                }
               
            }
        }else {
?>
	<div id="pass">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <table>
            <tr>
            	<td><label>Pasahitza:</label></td>
 
            	<td><input type="password" name="viejoPass" maxlength="15" /></td>
            </tr>
            <tr>
            	<td><label>Pasahitz berria:</label></td>
 
            	<td><input type="password" name="pass" maxlength="15" /></td>
 			</tr>
 			<tr>
            	<td><label>Pasahitz berria <br> konfirmatu:</label></td>
 
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
   <div><p id="kk">asdf</p></div>
<?php
        }
    }else {
        header("location:index.php");
    }
?> 

<?php
$sql="SELECT * FROM iruzkinak WHERE erabiltzailea='".$_SESSION["user"]."';";
$result=mysqli_query($con, $sql);
?>

<div id="sagardo">

<?php
while($row=mysqli_fetch_array($result)){
?>
	<label>Sagardotegia: </label><input type="text" value="<?php echo $row['sagardotegia']; ?>" />
	<label>Erabiltzailea: </label><input type="text" value="<?php echo $row['erabiltzailea']; ?>" />
	<label>Data: </label><input type="text" value="<?php echo $row['data']; ?>" />
	<br>
	Iruzkina:<br><textarea type="text" rows="5" style="width: 728px;"><?php echo $row['iruzkina'];?></textarea>
	<input type="checkbox"/>
	<br><br>
<?php
}
?>
<input type="button" id="butiruzkin" value="Iruzkinak ezabatu"/>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#datu").click(function(){
		$("#datuak").show();
		$("#sagardo").hide();
		$("#pass").hide();
		$("#lista").hide();
	});
	$("#iruzkin").click(function(){
		$("#datuak").hide();
		$("#sagardo").show();
		$("#pass").hide();
		$("#lista").hide();
	});
	$("#cambiopass").click(function(){
		$("#datuak").hide();
		$("#sagardo").hide();
		$("#pass").show();
		$("#lista").hide();
	});
	$("#butlista").click(function(){
	 	$("#lista").slideToogle("slow");
	});
 });
</script>
</div>
</body>
</html>