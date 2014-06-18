<?php
	session_start();
	include_once("../myBBDD.php");
	$mybd = new myBBDD();
	include("../../modelo/MProductos.php");
	include("../../modelo/MCategorias.php");

	$_SESSION['categorias'] = getCategorias($mybd);
	$_SESSION['productos'] = getProductos($mybd);
	header('Location: ../../plantilla/nuevoPedido.php');
?>