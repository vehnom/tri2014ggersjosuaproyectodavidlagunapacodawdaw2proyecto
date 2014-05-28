<?php
include_once("../services/myBBDD.php");
$mybd = new myBBDD();
include($_SESSION[".."]."/modelo/MProveedores.php");
actualizaProveedores($mybd);

function actualizaProveedores($mybd){
	$array_operarios = getProveedores($mybd);
	escribeProveedores($array_operarios);
}

function escribeProveedores($array_operarios){
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