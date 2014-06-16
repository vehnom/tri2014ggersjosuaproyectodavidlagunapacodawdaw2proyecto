<?php
include_once("../services/myBBDD.php");

$mybd = new myBBDD();

actualizaProveedores($mybd);

function actualizaProveedores($mybd){
	$array_proveedores = getProveedores($mybd);
	escribeProveedores($array_proveedores);
}



function getProveedores($mybd){
	$query = "SELECT * FROM proveedores";
	$array_proveedores = array();
	$result = $mybd -> consulta($query);

	while($fila = mysql_fetch_assoc($result)){
		array_push($array_proveedores, $fila);
	}

	return $array_proveedores;
}

function escribeProveedores($array_proveedores){
	$string_proveedores = '';
	$string_proveedores .= '{ "data": [';
	
	for($i = 0; $i < count($array_proveedores); $i++){
		$string_proveedores .= '{';
		$string_proveedores .=  '"Id_Proveedor":' . $array_proveedores[$i]['Id_Proveedor'] . ',';
		$string_proveedores .=  '"Nombre":' . '"' . $array_proveedores[$i]['Nombre'] . '"' . ',';
		
		if($array_proveedores[$i]['Apellido1'] != NULL){
			$string_proveedores .=  '"Apellido1":"' . $array_proveedores[$i]['Apellido1'] . '",';
		}else{
			$string_proveedores .=  '"Apellido1":' . '" "' . ',';
		}
		
		if($array_proveedores[$i]['Apellido2'] != NULL){
			$string_proveedores .=  '"Apellido2":"' . $array_proveedores[$i]['Apellido2'] . '",';
		}else{
			$string_proveedores .=  '"Apellido2":' . '" "' . ',';
		}
		
		if($array_proveedores[$i]['Nombre_Empresa'] != NULL){
			$string_proveedores .=  '"Nombre_Empresa":"' . $array_proveedores[$i]['Nombre_Empresa'] . '",';
		}else{
			$string_proveedores .=  '"Nombre_Empresa":' . '" "' . ',';
		}
		
		$string_proveedores .=  '"Telefono1":' . '"' . $array_proveedores[$i]['Telefono1'] . '"' . ',';
		
		if($array_proveedores[$i]['Telefono2'] != NULL){
			$string_proveedores .=  '"Telefono2":' . $array_proveedores[$i]['Telefono2'] . ',';
		}else{
			$string_proveedores .=  '"Telefono2":' . '" "' . ',';
		}
		$string_proveedores .=  '"NIF":' . '"' . $array_proveedores[$i]['NIF'] . '"' . ',';
		$string_proveedores .=  '"Direccion":' . '"' . $array_proveedores[$i]['Direccion'] . '"' . ',';
		$string_proveedores .=  '"Cod_Postal":' . '"' . $array_proveedores[$i]['Cod_Postal'] . '"' . ',';
		$string_proveedores .=  '"Localidad":' . '"' . $array_proveedores[$i]['Localidad'] . '"' . ',';
		$string_proveedores .=  '"Provincia":' . '"' . $array_proveedores[$i]['Provincia'] . '"' . ',';
		$string_proveedores .=  '"Referencia":' . '"' . $array_proveedores[$i]['Referencia'] . '"' . ',';
		
		if($array_proveedores[$i]['Observaciones'] != NULL){
			$string_proveedores .=  '"Observaciones":"' . $array_proveedores[$i]['Observaciones'] . '"';
		}else{
			$string_proveedores .=  '"Observaciones":' . '" "' . '"';
		}
		
		if($i == (count($array_proveedores) - 1)){
			$string_proveedores .= "}";
		} else {
			$string_proveedores .= "},";
		}	
	}

	$string_proveedores .= "]}";

	$fp = fopen("../services/proveedores/proveedores.txt", "w+");
	fwrite($fp, $string_proveedores);
	fclose($fp);	
}
?>