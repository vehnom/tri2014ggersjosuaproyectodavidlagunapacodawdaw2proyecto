<?php
	session_start();
	include_once($_SESSION[".."]."/services/myBBDD.php");
	$mybd = new myBBDD();
	include($_SESSION[".."]."/modelo/MVehiculo.php");

	insertDatosVehiculoForm($mybd);

	header('Location: ../../plantilla/tablaVehiculos.php'); 
?>