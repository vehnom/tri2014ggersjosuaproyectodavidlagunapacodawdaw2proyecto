<?php
	function getOperarios($mybd){
		$query = "SELECT * FROM operarios";
		$array_operarios = array();
		$result = $mybd -> consulta($query);

		while($fila = mysql_fetch_assoc($result)){
			array_push($array_operarios, $fila);
		}

		return $array_operarios;
	}
	function getOperariosxId($mybd, $id){
		$query = "SELECT * FROM operarios WHERE Id_Operario = ".$id."";
		$result = $mybd -> consulta($query);
		if($fila = mysql_fetch_assoc($result)){
		return $fila;
		}
			
	}
	function deleteDatosOperarioxDNI($mybd, $dni){
		$query = "DELETE FROM operarios WHERE DNI='$dni'";
		$result = $mybd -> delete($query);	
	}

	function insertDatosOperarioForm($mybd){
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
	}
	function updateDatosOperario($mybd,$idUsuario,$nombre,$apellido1,$apellido2,$telefono1,$telefono2,$direccion,$dni,$ss,$observaciones,$foto,$fecha){
		$query = "UPDATE operarios SET Nombre = '$nombre', Apellido = '$apellido1', Apellido2 = '$apellido2', Telefono = '$telefono1', Telefono2 = '$telefono2', Direccion = '$direccion', DNI = '$dni', Seg_Social = '$ss', Observacion = '$observaciones', Foto = '$foto', Fecha_Alta  = '$fecha' WHERE id_pruebas= '$idUsuario'";
		$result = $mybd -> update($query);		
	}
?>