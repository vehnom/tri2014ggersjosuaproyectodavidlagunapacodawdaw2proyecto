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
	
	function getVehiculos($mybd){
		$query = "SELECT * FROM flota_vehiculos";
		$array_vehiculos = array();
		$result = $mybd -> consulta($query);
		while($fila = mysql_fetch_assoc($result)){
			array_push($array_vehiculos, $fila);
		}

		return $array_vehiculos;	
	}
		
	function insertDatosVehiculoForm($mybd){
		$idOperario = $_POST['listaId'];
		$matricula = $_POST['matricula'];
		$marca = $_POST['marca'];
		$modelo = $_POST['modelo'];
		
		$query = "INSERT INTO flota_vehiculos (Id_Operario, Matricula, Marca, Modelo) VALUES
		('$idOperario', '$matricula', '$marca', '$modelo')";
		
		$result = $mybd -> insert($query);
	}
	
	function deleteDatosVehiculo($mybd, $matricula){
		$query = "DELETE FROM flota_vehiculos WHERE MATRICULA='$matricula'";
		$result = $mybd -> delete($query);
	}
	
	function pasarItv($mybd){
		$estado = $_POST['estado'];
		$fecha = $_POST['fecha'];
		
		$query = "INSERT INTO itv (Estado, Fecha_Pasar_ITV) VALUES ('$estado', '$fecha')";
		$result = $mybd -> insert($query);
	}
	
	function historialItv($mybd){
		$idVehiculo = $_POST['idVehiculo'];
		
		$query = "SELECT Id_ITV FROM itv order by Id_ITV desc limit 1";
		$result = $mybd -> consulta($query);
		
		if($fila = mysql_fetch_assoc($result)){
			$valor = $fila["Id_ITV"];
		}
		
		$query = "INSERT INTO historial_itv (Id_Vehiculo, Id_ITV) VALUES ($idVehiculo, $valor)";
		$result = $mybd -> insert($query);
	}
?>
