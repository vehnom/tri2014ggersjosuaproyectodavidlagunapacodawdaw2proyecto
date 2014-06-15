<?php
	include_once($_SESSION[".."]."/services/myBBDD.php");
	$mybd = new myBBDD();
	include($_SESSION[".."]."/modelo/MClientes.php");
	$decision = "0";
	if(isset($_POST['hideCliente'])){
		$decision = $_POST['hideCliente'];
	}
	switch($decision){
		case "1":
			$cliente = $_POST['listaCliente'];
			deleteDatosCliente($mybd, $cliente);
			header('Location: tablaClientes.php');
		break;
		default:
			$_SESSION['clientes'] = getClientes($mybd);
	}
?>