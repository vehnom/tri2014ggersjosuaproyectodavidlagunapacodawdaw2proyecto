<?php
	session_start();
	include_once("../myBBDD.php");
	$mybd = new myBBDD();
	include("../../modelo/MProveedores.php");
	$decision = "0";
	if(isset($_POST['hideProveedor'])){
		$decision = $_POST['hideProveedor'];
	}
	switch($decision){
		case "1":
			updateDatosOperario($mybd);
			header('Location: ../../plantilla/tablaProveedores.php');
		break;
		default:
			$idProveedor = $_GET['p']; 
			$_SESSION['proveedores'] = getProveedoresxId($mybd,$idProveedor);
			header('Location: ../../plantilla/editarProveedor.php');
	}
?>