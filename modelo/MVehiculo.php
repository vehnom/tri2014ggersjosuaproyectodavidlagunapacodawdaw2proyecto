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
		$idVehiculo = $_POST['idVehiculo']; 
		$idOperario = $_POST['listaId'];
		$matricula = $_POST['matricula'];
		$marca = $_POST['marca'];
		$modelo = $_POST['modelo'];
		
		$query = "INSERT INTO flota_vehiculos (Id_Vehiculo, Id_Operario, Matricula, Marca, Modelo) VALUES
		($idVehiculo, '$idOperario', '$matricula', '$marca', '$modelo')";
		
		$result = $mybd -> insert($query);
	}
	
	function deleteDatosVehiculo($mybd, $matricula){
		$query = "DELETE FROM flota_vehiculos WHERE MATRICULA='$matricula'";
		$result = $mybd -> delete($query);
	}
?>