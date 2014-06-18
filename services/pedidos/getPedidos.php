<?php
include_once("../services/myBBDD.php");

$mybd = new myBBDD();

actualizaOperarios($mybd);

function actualizaOperarios($mybd){
	$array_operarios = getOperarios($mybd);
	escribeOperarios($array_operarios);
}



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


function escribeOperarios($array_operarios){
	$string_operarios = '';
	$string_operarios .= '{ "data": [';
	


	for($i = 0; $i < count($array_operarios); $i++){
		$string_operarios .= '{';
		$string_operarios .=  '"Id_Operario":' . $array_operarios[$i]['Id_Operario'] . ',';
		if($array_operarios[$i]['Id_Usuario'] != NULL){
			$string_operarios .=  '"Id_Usuario":' . $array_operarios[$i]['Id_Usuario'] . ',';
		}else{
			$string_operarios .=  '"Id_Usuario":' . '" "' . ',';
		}
		$string_operarios .=  '"Nombre":' . '"' . $array_operarios[$i]['Nombre'] . '"' . ',';
		$string_operarios .=  '"Apellido":' . '"' . $array_operarios[$i]['Apellido'] . '"' . ',';
		$string_operarios .=  '"Apellido2":' . '"' . $array_operarios[$i]['Apellido2'] . '"' . ',';
		$string_operarios .=  '"Telefono":' . '"' . $array_operarios[$i]['Telefono'] . '"' . ',';
		if($array_operarios[$i]['Telefono2'] != NULL){
			$string_operarios .=  '"Telefono2":' . '"' . $array_operarios[$i]['Telefono2'] . '"' . ',';
		} else {
			$string_operarios .=  '"Telefono2":' . '" "' . ',';
		}
		$string_operarios .=  '"Direccion":' . '"' . $array_operarios[$i]['Direccion'] . '"' . ',';
		$string_operarios .=  '"DNI":' . '"' . $array_operarios[$i]['DNI'] . '"' . ',';
		$string_operarios .=  '"Seg_Social":' . '"' . $array_operarios[$i]['Seg_Social'] . '"' . ',';
		$string_operarios .=  '"Observacion":' . '"' . $array_operarios[$i]['Observacion'] . '"' . ',';
		$string_operarios .=  '"Foto":' . '"' . $array_operarios[$i]['Foto'] . '"' . ',';
		$string_operarios .=  '"Fecha_Alta":' . '"' . $array_operarios[$i]['Fecha_Alta'] . '"';
		if($i == (count($array_operarios) - 1)){
			$string_operarios .= "}";
		} else {
			$string_operarios .= "},";
		}
		
	}

	$string_operarios .= "]}";

	//echo $string_operarios;
	//$string_prueba = "jejeje";
	//Escribir en un archivo una nueva línea
	$fp = fopen("../services/operarios/operarios.txt", "w+");
	fwrite($fp, $string_operarios);
	fclose($fp);
	
}
	


?>