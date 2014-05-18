<?php
	include_once("../myBBDD.php");

	$mybd = new myBBDD();

	getDatosOperario($mybd);

	function getDatosOperario($mybd){
		$dni = $POST['listaDni'];
				
		$query = "DELETE FROM operarios WHERE DNI='$dni'";
		
		//$result = $mybd -> delete($query);
		
		//echo $result . "<br>";
		
		echo $dni;

				
		//header('Location: ../../plantilla/operarios.php'); 
		
	}
?>