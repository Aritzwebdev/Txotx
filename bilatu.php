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
	<ul id="hizkuntzak">
		<li><a href="">eu</a></li>
		<li>|</li>
		<li><a href="">es</a></li>
	</ul>
	<ul id="top_header">
		<li><a href="">Sagardotegiak</a></li>
		<li><a href="index.php">Hasiera</a></li>
	</ul>
</header>
<?php
	$herria=$_POST["herria"];
?>
<div id="menu_txikia">
	<form action="index.php" method="post">
		<input id="bilatu" type="submit" name="herria" value="Bilatzailea" />
	</form>
</div>
	<div id="header">
		<img id="logo" src="img/logo.png"/>
		<h1><?php echo $herria ?></h1>
		<form action="bilatu.php" method="POST">
			<input type="search" name="herria" placeholder="buscar..." />
		</form>
	</div>

<?php
	
	include "conectar.php";
    $con = conectar();
	

	$sql="SELECT idherriak FROM herriak WHERE izena='".$herria."';";
	$result=mysqli_query($con, $sql);

	/*if(!$result){
		echo "Error resultado";
		exit;
	}*/

	$idherria=mysqli_fetch_array($result);
	$id=$idherria['idherriak'];

	$sql="SELECT izena FROM sagardotegiak WHERE herria='".$id."';";
	$result=mysqli_query($con, $sql);

	if(!mysqli_num_rows($result)){
		echo "Ez dago sagardotegirik";
	}
	else{
		while($row=mysqli_fetch_array($result)){
?>
			<div id="izena">
				<?php
					$izena=$row['izena'];
				?>
				<form action="sagardotegia.php" method="get">
					<input type="hidden" name="herria" value="<?php echo $herria ?>">
					<input id="sagar_ize" type="submit" name="izena" 
					value="<?php echo $izena ?>">
				</form>
			</div>
<?php
		}
	}
	mysqli_close($con);
?>	
</body>
</html>
