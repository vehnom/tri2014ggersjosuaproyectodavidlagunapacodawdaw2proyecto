<?php
	session_start();
	include_once($_SESSION[".."]."/services/myBBDD.php");
	$mybd = new myBBDD();
	include($_SESSION[".."]."/modelo/MPedidos.php");

	insertDatosPedidoForm($mybd);

	header('Location: ../../plantilla/pedidos.php'); 
?>