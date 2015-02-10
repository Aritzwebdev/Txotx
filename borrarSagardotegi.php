<?php 
	if(isset($_POST['borrar'])){
		include 'conectar.php';
		$conexion=conectar();
		if($_POST['iruzkinak']=""){
			echo "Ez duzu sagardotegirik ezabatu";
		}else{
			$sagardotegis = $_POST['sagardotegiak'];
			foreach ($sagardotegis as $indice => $valor) {
				$valor=ereg_replace("[^A-Za-z0-9]", "", $valor);
			    $consulta = "DELETE FROM sagardotegiak 
			        WHERE idsagardotegiak=$valor";
			   	if(mysqli_query($conexion, $consulta)){
			   		echo "<script type='text/javascript'>location.href = 'admin.php';</script>";
			   	}else{
			   		echo "<script type='text/javascript'>alert('Ezin da sagardotegia ezabatu');location.href = 'admin.php';</script>";
			   	}
			}
		} 
	}else{
		header("Location:admin.php");
	}	
?>
