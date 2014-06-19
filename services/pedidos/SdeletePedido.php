<?php
	include_once($_SESSION[".."]."/services/myBBDD.php");
	$mybd = new myBBDD();
	include($_SESSION[".."]."/modelo/MPedidos.php");
	$decision = "0";
	if(isset($_POST['hidePedido'])){
		$decision = $_POST['hidePedido'];
	}
	switch($decision){
		case "1":
			$Id = $_POST['listaId'];
			deleteDatosPedidoxId($mybd, $Id);
			header('Location: tablaPedidos.php');
		break;
		default:
			$_SESSION['pedidos'] = getPedidos($mybd);
	}
?>