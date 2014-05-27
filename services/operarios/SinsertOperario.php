<?php
	session_start();
	include_once("../myBBDD.php");
	$mybd = new myBBDD();
	include("../../modelo/MOperarios.php");

	insertDatosOperarioForm($mybd);

	header('Location: ../../plantilla/nuevoOperario.php'); 
?>