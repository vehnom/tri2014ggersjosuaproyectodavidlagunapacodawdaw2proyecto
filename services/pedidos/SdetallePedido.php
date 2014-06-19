<?php
	session_start();
	include_once("../myBBDD.php");
	$mybd = new myBBDD();
	include("../../modelo/MPedidos.php");
	$id = $_GET['id'];
	$_SESSION['detalle'] = getDetallePedidosxId($mybd,$id);
	header('Location: ../../plantilla/detallePedido.php');
?>