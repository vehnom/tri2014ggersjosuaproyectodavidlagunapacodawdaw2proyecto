<?php
include_once("../services/myBBDD.php");

$mybd = new myBBDD();

actualizaVehiculos($mybd);

function actualizaVehiculos($mybd){
	$array_vehiculos = getVehiculos($mybd);
	escribeVehiculos($array_vehiculos);
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

function escribeVehiculos($array_vehiculos){
	$string_vehiculos = '';
	$string_vehiculos .= '{ "data": [';
	
	for($i = 0; $i < count($array_vehiculos); $i++){
		$string_vehiculos .= '{';
		$string_vehiculos .=  '"Id_Vehiculo":' . $array_vehiculos[$i]['Id_Vehiculo'] . ',';
		if($array_vehiculos[$i]['Id_Operario'] != NULL){
			$string_vehiculos .=  '"Id_Operario":' . $array_vehiculos[$i]['Id_Operario'] . ',';
		}else{
			$string_vehiculos .=  '"Id_Operario":' . '" "' . ',';
		}
		$string_vehiculos .=  '"Matricula":' . '"' . $array_vehiculos[$i]['Matricula'] . '"' . ',';
		$string_vehiculos .=  '"Marca":' . '"' . $array_vehiculos[$i]['Marca'] . '"' . ',';
		$string_vehiculos .=  '"Modelo":' . '"' . $array_vehiculos[$i]['Modelo'] . '"';
		if($i == (count($array_vehiculos) - 1)){
			$string_vehiculos .= "}";
		} else {
			$string_vehiculos .= "},";
		}	
	}

	$string_vehiculos .= "]}";

	$fp = fopen("../services/flota/vehiculos.txt", "w+");
	fwrite($fp, $string_vehiculos);
	fclose($fp);	
}
?>