<?php
	session_start();
	include_once($_SESSION[".."]."/services/myBBDD.php");
	$mybd = new myBBDD();
	include($_SESSION[".."]."/modelo/MAvisos.php");

	$query = insertDatosAvisoForm($mybd);
	header('Location: ../../services/avisos/savisosMapa.php'); 
?>