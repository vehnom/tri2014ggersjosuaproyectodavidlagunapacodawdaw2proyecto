<?php
	session_start();
	include_once($_SESSION[".."]."/services/myBBDD.php");
	$mybd = new myBBDD();
	include($_SESSION[".."]."/modelo/MVehiculo.php");

	pasarItv($mybd);
	historialItv($mybd);

	header('Location: ../../plantilla/tablaVehiculos.php'); 
?>