<?php
	include_once("../myBBDD.php");

	$mybd = new myBBDD();

	getDatosVehiculo($mybd);

	function getDatosVehiculo($mybd){
		$matricula = $_POST['listaMatricula'];

		$query = "DELETE FROM flota_vehiculos WHERE MATRICULA='$matricula'";
		$result = $mybd -> delete($query);
		header('Location: ../../plantilla/borrarVehiculo.php');
	}
?>