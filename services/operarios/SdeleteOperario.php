<?php
	include_once("../myBBDD.php");

	$mybd = new myBBDD();

	getDatosOperario($mybd);

	function getDatosOperario($mybd){
		$dni = $_POST['listaDni'];

		$query = "DELETE FROM operarios WHERE DNI='$dni'";
		$result = $mybd -> delete($query);
		header('Location: ../../plantilla/borrarOperario.php');
	}
?>