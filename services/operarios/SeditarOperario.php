<?php
	session_start();
	include_once("../myBBDD.php");
	$mybd = new myBBDD();
	include("../../modelo/MOperarios.php");
	$decision = "0";
	if(isset($_POST['hideOperario'])){
		$decision = $_POST['hideOperario'];
	}
	switch($decision){
		case "1":
			$idUsuario = $_POST['idUsuario'];
			$nombre = $_POST['nombre'];
			$apellido1 = $_POST['apellido1'];
			$apellido2 = $_POST['apellido2'];
			$telefono1 = $_POST['telefono1'];
			$telefono2 = $_POST['telefono2'];
			$direccion = $_POST['direccion'];
			$dni = $_POST['dni'];
			$ss = $_POST['ss'];
			$observaciones = $_POST['observaciones'];
			$foto = $_POST['foto'];
			$fecha = $_POST['fecha'];
			updateDatosOperario($mybd,$idUsuario,$nombre,$apellido1,$apellido2,$telefono1,$telefono2,$direccion,$dni,$ss,$observaciones,$foto,$fecha);
			header('Location: ../../plantilla/tablaOperarios.php');
		break;
		default:
			$idUsuario = $_GET['u']; 
			$_SESSION['operario'] = getOperariosxId($mybd,$idUsuario);
			header('Location: ../../plantilla/editarOperario.php?u='.$idUsuario);
	}
?>