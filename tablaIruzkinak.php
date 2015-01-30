<div class="greenBox">
	<div class="myTable">
		<table class="table-bordered table-striped table-condensed flip-content">
		<form action="borrarComentarios.php" method="post">
			<thead class="flip-content">
				<tr>
					<th>Borrar</th>
					<th>Id</th>
					<th>Erabiltzailea</th>
					<th>Data</th>
					<th>Iruzkina</th>
					<th>Sagardotegia</th>
				</tr>
			</thead>
			<tbody>
				<?php 
	include_once 'conectar.php';
	$conexion=conectar();
	// Seleccionar todos los registros 
	$consulta = "SELECT * FROM iruzkinak";
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