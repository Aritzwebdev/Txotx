<?php
	//function getArraySQL(){
		$probintzia=$_GET["probintzia"];

		include("conectar.php");
		$con=conectar();

		mysqli_set_charset($con, "utf8");
		$sql="SELECT izena,sagardotegi_kop FROM herriak WHERE probintzia='".$probintzia."';";

		if(!$result=mysqli_query($con, $sql)) die();
		
		$rawdata=array();

		while($row=mysqli_fetch_array($result)){
			$Herria=$row['izena'];
			$Sagardotegi_kopurua=$row['sagardotegi_kop'];

			$rawdata[]=array('Herria'=>$Herria, 'Sagardotegi_kopurua'=>$Sagardotegi_kopurua);
			
		}
		mysqli_close($con);
		//return $rawdata;
	//}

	//$myArray=getArraySQL();
	echo json_encode($rawdata);
?>