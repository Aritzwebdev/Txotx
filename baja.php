<?php 
			session_start();
			//incluimos el archivo conexion.php para utilizar sus funciones
			include 'conectar.php';
			//guardo en variables el nombre de la bd y de la tabla que voy a utilizar
			$con=conectar();
			$sql="DELETE FROM erabiltzaileak WHERE erabiltzailea='".$_SESSION["user"]."';";
			$result=mysqli_query($con, $sql);
			//ejecutamos la consulta
			if($result){
				//si se ejecuta correctamente

			?>
				<script languaje="javascript">
					location.href = "logout.php";
				  	alert("Te has dado de baja!");
				</script>
			<?php 
			}else{
				//si no se ejecuta correctamente
				print "<h3>Error al darte de baja</h3> <br>";
			}
	?>