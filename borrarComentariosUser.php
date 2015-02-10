<?php 
	if(isset($_POST['borrar'])){
		include 'conectar.php';
		$conexion=conectar();
		if($_POST['iruzkinak']==""){
			echo "Ez duzu iruzkinik ezabatu";
		}else{
			$comentarios = $_POST['iruzkinak'];
		
			foreach ($comentarios as $indice => $valor) {
				$valor=ereg_replace("[^A-Za-z0-9]", "", $valor);
			    $consulta = "DELETE FROM iruzkinak 
			        WHERE idiruzkinak=$valor";
			   	if(mysqli_query($conexion, $consulta)){
			   		echo "<script type='text/javascript'>location.href = 'perfil.php';</script>";
			   	}else{
			   		echo "<script type='text/javascript'>alert('Ezin da sagardotegia ezabatu');location.href = 'perfil.php';</script>";
			   	}
			}
		} 	 
	}else{
		header("Location:perfil.php");
	}
?>