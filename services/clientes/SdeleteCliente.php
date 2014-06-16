<?php
	include_once($_SESSION[".."]."/services/myBBDD.php");
	include($_SESSION[".."]."/modelo/MClientes.php");
	$mybd = new myBBDD();
	
	$decision = "0";
	if(isset($_POST['hideCliente'])){
		$decision = $_POST['hideCliente'];
	}
	switch($decision){
		case "1":
			error_log("Entra a la decision!!");
			$cliente = $_POST['listaCliente'];
			deleteDatosCliente($mybd, $cliente);
			header('Location: ../plantilla/tablaClientes.php');
		break;
		default:
			$_SESSION['clientes'] = getClientes($mybd);
			error_log("Entra por defecto...");
	}
?>