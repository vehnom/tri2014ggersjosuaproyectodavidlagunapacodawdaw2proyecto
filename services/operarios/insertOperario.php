<?php
	include_once("../myBBDD.php");

	$mybd = new myBBDD();

	getDatosOperario($mybd);

	function getDatosOperario($mybd){
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
		
		$query = "INSERT INTO operarios (Id_Usuario, Nombre, Apellido, Apellido2, Telefono, Telefono2, Direccion, DNI, Seg_Social, Observacion, Foto, Fecha_Alta) VALUES
		(1, '$nombre', '$apellido1', '$apellido2', '$telefono1', '$telefono2', '$direccion', '$dni', '$ss', '$observaciones', '$foto', '$fecha')";
		
		$result = $mybd -> insert($query);
		
		if($result == "1"){
			echo "<script type=\"text/javascript\">alert(\"Operario creado correctamente.\");</script>";  
			
		}
		else{
			echo "<script type=\"text/javascript\">alert(\"Error al crear el operario.\");</script>";  
		}
		
		header('Location: ../../plantilla/nuevoOperario.php'); 
		
	}
?>