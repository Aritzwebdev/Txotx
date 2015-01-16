<?php
	session_start();
		include 'conectar.php';
		$con=conectar();
		


	$encontrado=false;
		

		
		

		if(isset($_POST["erailtzaileaLog"]&&isset($_POST["pasahitzaLog"])){
		    $sql="SELECT iderabiltzaileak ,erabiltzailea, pasahitza FROM erabiltzaileak;";
			$result=mysqli_query($con, $sql);
		
			while($row=mysqli_fetch_array($result)){
				//$row=mysql_fetch_array($result);
				if($row['erabiltzailea']==$_POST["erailtzaileaLog"] && $row['pasahitza']==$_POST["pasahitzaLog"]){
					GLOBAL $encontrado;
					$encontrado=true;
					break;
				}
			}
		}
		
		header('Content-Type: application/json');
		$data = '{encontrado:"' . $encontrado . '"}';
		
		echo json_encode($data);
		
		mysqli_close($con);	
?>