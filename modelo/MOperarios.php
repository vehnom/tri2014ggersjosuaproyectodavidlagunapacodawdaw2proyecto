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
	function deleteDatosOperarioxId($mybd, $id){
		$query = "DELETE FROM operarios WHERE Id_Operario='$id'";
		$result = $mybd -> delete($query);	
	}

	function insertDatosOperarioForm($mybd){
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
		
		$query = "INSERT INTO operarios (Nombre, Apellido, Apellido2, Telefono, Telefono2, Direccion, DNI, Seg_Social, Observacion, Foto, Fecha_Alta) VALUES
		('$nombre', '$apellido1', '$apellido2', '$telefono1', '$telefono2', '$direccion', '$dni', '$ss', '$observaciones', '$foto', '$fecha')";
		
		$result = $mybd -> insert($query);
	}

	function updateDatosOperario($mybd,$idOperario,$nombre,$apellido1,$apellido2,$telefono1,$telefono2,$direccion,$dni,$ss,$observaciones,$foto,$fecha){
		$query = "UPDATE operarios SET Nombre = '$nombre', Apellido = '$apellido1', Apellido2 = '$apellido2', Telefono = '$telefono1', Telefono2 = '$telefono2', Direccion = '$direccion', DNI = '$dni', Seg_Social = '$ss', Observacion = '$observaciones', Foto = '$foto', Fecha_Alta  = '$fecha' WHERE Id_Operario = '$idOperario'";
		$result = $mybd -> update($query);		
	}
	
	function insertVacaciones($mybd){
		$operario = $_POST['idOperario'];
		$fechaInicio = $_POST['fecha_inicio'];
		$fechaFin = $_POST['fecha_fin'];
		
		$dias = (strtotime($fechaInicio)-strtotime($fechaFin))/86400;
		$dias = abs($dias); $dias = floor($dias);
		
		$query = "INSERT INTO vacaciones(Id_Operario,Fecha_Ini,Fecha_Fin,Cantidad_Vacaciones) VALUES
		($operario,'$fechaInicio','$fechaFin',$dias)";
		
		$result = $mybd -> insert($query);
	}
?>