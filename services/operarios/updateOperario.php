<?php
	session_start();
	include_once("../myBBDD.php");
	include_once("../getOperarios.php");
	$mybd = new myBBDD();
	$idUsuario = $_GET['u_']; 
	
	$_SESSION['operario'] = getOperariosxId($mybd,$idUsuario);

	function updateDatosOperario($mybd){
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


		$query = "UPDATE operarios SET Nombre = '$nombre', Apellido = '$apellido1', Apellido2 = '$apellido2', Telefono = '$telefono1', Telefono2 = '$telefono2', Direccion = '$direccion', DNI = '$dni', Seg_Social = '$ss', Observacion = '$observaciones', Foto = '$foto', Fecha_Alta  = '$fecha' WHERE id_pruebas= '$idUsuario'";
		
		$result = $mybd -> update($query);
		
		if($result == "1"){
			echo "<script type=\"text/javascript\">alert(\"Operario creado correctamente.\");</script>";  
			
		}
		else{
			echo "<script type=\"text/javascript\">alert(\"Error al crear el operario.\");</script>";  
		}
		
		header('Location: ../../plantilla/nuevoOperario.php'); 
		
	}
?>