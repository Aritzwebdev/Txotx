<!DOCTYPE HTML>
<html>
<head>
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
	<link rel="stylesheet" href="css/bilatu.css"/>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#izena').click(function(){
				$('bilatu.php',{'#izena':$(this).text()},function(data){
					$('#sagartotegia').load (sagardotegia.php);
				});
				return false;
			});
		}) ;
	</script>
</head>
<body>
<header id="registro">

	<ul id="top_header">
		<li><a href="index.php" id="hasiera" >Hasiera</a></li>
		<li><a href="#" id="argazkiak" onclick="argazkiak();"> Argazkiak </a></li>
		<li><a href="#" id="mapa" onclick="mapa();"> Mapa </a></li>
	</ul>
	<ul id="hizkuntzak">
		<li><a href="">eu</a></li>
		<li>|</li>
		<li><a href="">es</a></li>
	</ul>

</header>
<?php
	$herria=$_GET["herria"];
?>
<div id="menu_txikia">
	<form action="index.php" method="post">
		<input id="bilatu" type="submit" name="herria" value="Bilatzailea" />
	</form>
</div>
	<div id="header">
		<img id="logo" src="img/logo.png"/>
		<h1><?php echo $herria ?></h1>
		<form action="bilatu.php" method="GET">
			<input type="search" name="herria" placeholder="bilatu..." />
		</form>
	</div>

<?php
	
	include "conectar.php";
    $con = conectar();
	

	$sql="SELECT idherriak FROM herriak WHERE izena='".$herria."';";
	$result=mysqli_query($con, $sql);

	if(!$result){
		echo "Error resultado";
		exit;
	}

	$idherria=mysqli_fetch_array($result);
	$id=$idherria['idherriak'];

	$sql="SELECT izena FROM sagardotegiak WHERE herria='".$id."';";
	$result=mysqli_query($con, $sql);

	if(!mysqli_num_rows($result)){
		echo "Ez dago sagardotegirik";
	}
	else{
		while($row=mysqli_fetch_array($result)){
			$sagardotegia=$row['izena'];
?>
			<div id="izena">					
				<form action="sagardotegia.php" method="get">
					<input id="sagar_ize" type="submit" name="sagardotegia" value="<?php echo $sagardotegia ?>">
				</form>
			</div>
<?php
		}
	}
	mysqli_close($con);
?>	

	<div>
		 <!-- Cabecera -->
        <header>
            <h1>Parsear o leer JSON con jQuery</h1>
        </header>

        <!-- Contenido -->
        <section>
            
        <div id="taulaHerriak">
			<table class="grilla" id="tablajson">
				<thead>
					<th>Herriak</th>			
				</thead>
				<tbody></tbody>
			</table>
		<div>
			<script type="text/javascript">

			$(document).ready(function(){
				var url="listaPueblos.php";
				$("#tablajson tbody").html("");
				
				$.getJSON(url,function(pueblos){
					$.each(pueblos, function(i,pueblo){
						var newRow =
						"<tr>"
						+"<td>"+pueblo.Herria+"</td>"
						+"</tr>";
						$(newRow).appendTo("#tablajson tbody");
					});
				});
			});

			</script>
 
        </section>
	</div>

</body>
</html>
