<?php

	include_once($_SESSION[".."]."/services/myBBDD.php");
	$mybd = new myBBDD();
	include($_SESSION[".."]."/modelo/MVehiculo.php");
	$decision = "0";
	if(isset($_POST['hideVehiculo'])){
		$decision = $_POST['hideVehiculo'];
	}
	switch($decision){
		case "1":
			$matricula = $_POST['listaMatricula'];
			$elimina = deleteDatosVehiculo($mybd, $matricula);

			header('Location: tablaVehiculos.php');
		break;
		default:
			$_SESSION['vehiculos2'] = getVehiculos($mybd);
	}
?>