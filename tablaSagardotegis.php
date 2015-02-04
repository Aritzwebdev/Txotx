<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8"/>
</head>
<body>

<div class="greenBox">
	<div class="myTable">
		<table class="table-bordered table-striped table-condensed flip-content">
		<form action="borrarSagardotegi.php" method="post">
			<thead class="flip-content">
				<tr>
					<th>Borrar</th>
					<th>Id</th>
					<th>Izena</th>
					<th>Herria</th>
					<th>Deskribapena</th>
					<th>Probintzia</th>
					<th>Telefonoa</th>
					<th>Email</th>
					<th>Web</th>
				</tr>
			</thead>
			<tbody>
				<?php 
	include_once 'conectar.php';
	$conexion=conectar();
	// Seleccionar todos los registros 
	$consulta = "SELECT idsagardotegiak, izena, herria, deskribapena, probintzia, telefonoa, email, web FROM sagardotegiak";
	$result=mysqli_query($conexion, $consulta);
	while ($registro = mysqli_fetch_row($result)){
		echo "<tr>";
		echo "<td><input type='checkbox' name='sagardotegiak[]' value=$registro[0]/></td>";
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

</body>
</html>