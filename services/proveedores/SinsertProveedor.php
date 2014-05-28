<?php
	session_start();
	include_once($_SESSION[".."]."/services/myBBDD.php");
	$mybd = new myBBDD();
	include($_SESSION[".."]."/modelo/MProveedores.php");

	insertDatosProveedorForm($mybd);

	header('Location: ../../plantilla/tablaProveedores.php'); 
?>