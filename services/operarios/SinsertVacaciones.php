<?php
	session_start();
	include_once($_SESSION[".."]."/services/myBBDD.php");
	$mybd = new myBBDD();
	include($_SESSION[".."]."/modelo/MOperarios.php");

	insertVacaciones($mybd);

	header('Location: ../../plantilla/tablaOperarios.php'); 
?>