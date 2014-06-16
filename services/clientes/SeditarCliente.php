<?php
	session_start();
	include_once("../myBBDD.php");
	$mybd = new myBBDD();
<<<<<<< HEAD
	include("../../modelo/MClientes.php");
	$decision = "0";
	if(isset($_POST['hideCliente'])){
		$decision = $_POST['hideCliente'];
	}
	switch($decision){
		case "1":
			$idCliente = $_POST['idCliente'];
=======
	include("../../modelo/MOperarios.php");
	$decision = "0";
	if(isset($_POST['hideOperario'])){
		$decision = $_POST['hideOperario'];
	}
	switch($decision){
		case "1":
			$idUsuario = $_POST['idUsuario'];
>>>>>>> origin/master
			$nombre = $_POST['nombre'];
			$apellido1 = $_POST['apellido1'];
			$apellido2 = $_POST['apellido2'];
			$telefono1 = $_POST['telefono1'];
			$telefono2 = $_POST['telefono2'];
			$direccion = $_POST['direccion'];
<<<<<<< HEAD
			$nif = $_POST['nif'];
			$codPostal = $_POST['codPostal'];
			$observaciones = $_POST['observaciones'];
			$localidad = $_POST['localidad'];
			$provincia = $_POST['provincia'];
			$email = $_POST['email'];
			$moroso = $_POST['moroso'];
			updateDatosCliente($mybd,$idCliente,$nombre,$apellido1,$apellido2,$telefono1,$telefono2,$direccion,$nif,$codPostal,$observaciones,$localidad,$provincia, $email, $moroso);
			header('Location: ../../plantilla/tablaClientes.php');
		break;
		default:
			$idCliente = $_GET['u']; 
			$_SESSION['cliente'] = getClientesxId($mybd,$idCliente);
			header('Location: ../../plantilla/editarCliente.php?u='.$idOperario);
=======
			$dni = $_POST['dni'];
			$ss = $_POST['ss'];
			$observaciones = $_POST['observaciones'];
			$foto = $_POST['foto'];
			$fecha = $_POST['fecha'];
			updateDatosOperario($mybd,$idUsuario,$nombre,$apellido1,$apellido2,$telefono1,$telefono2,$direccion,$dni,$ss,$observaciones,$foto,$fecha);
			header('Location: ../../plantilla/tablaOperarios.php');
		break;
		default:
			$idOperario = $_GET['u']; 
			$_SESSION['operario'] = getOperariosxId($mybd,$idOperario);
			header('Location: ../../plantilla/editarOperario.php?u='.$idOperario);
>>>>>>> origin/master
	}
?>