<?php
	include_once($_SESSION[".."]."/services/myBBDD.php");
	$mybd = new myBBDD();
	include($_SESSION[".."]."/modelo/MProveedores.php");
	$decision = "0";
	if(isset($_POST['hideProveedor'])){
		$decision = $_POST['hideProveedor'];
	}
	switch($decision){
		case "1":
			$Id = $_POST['listaId'];
			deleteDatosProveedorxId($mybd, $Id);
			header('Location: tablaProveedores.php');
		break;
		default:
			$_SESSION['proveedores'] = getProveedores($mybd);
	}
?>