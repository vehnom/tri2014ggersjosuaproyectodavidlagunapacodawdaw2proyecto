<?php
	session_start();
	include_once($_SESSION[".."]."/services/myBBDD.php");
	$mybd = new myBBDD();
	include($_SESSION[".."]."/modelo/MClientes.php");

	insertDatosClienteForm($mybd);

	header('Location: ../../plantilla/tablaClientes.php'); 
?>