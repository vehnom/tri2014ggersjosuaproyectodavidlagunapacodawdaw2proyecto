<?php
include_once("../services/myBBDD.php");

$mybd = new myBBDD();

actualizaClientes($mybd);

function actualizaClientes($mybd){
	$array_clientes = getClientes($mybd);
	escribeClientes($array_clientes);
}



function getClientes($mybd){
	$query = "SELECT * FROM clientes";
	$array_clientes = array();
	$result = $mybd -> consulta($query);

	while($fila = mysql_fetch_assoc($result)){
		array_push($array_clientes, $fila);
	}

	return $array_clientes;
}

function escribeClientes($array_clientes){
	$string_clientes = '';
	$string_clientes .= '{ "data": [';
	
	for($i = 0; $i < count($array_clientes); $i++){
		$string_clientes .= '{';
		$string_clientes .=  '"Id_Cliente":' . $array_clientes[$i]['Id_Cliente'] . ',';
		$string_clientes .=  '"Nombre":' . '"' . $array_clientes[$i]['Nombre'] . '"' . ',';
		$string_clientes .=  '"Apellido1":' . '"' . $array_clientes[$i]['Apellido1'] . '"' . ',';
		$string_clientes .=  '"Apellido2":' . '"' . $array_clientes[$i]['Apellido2'] . '"' . ',';
		$string_clientes .=  '"Direccion":' . '"' . $array_clientes[$i]['Direccion'] . '"' . ',';
		$string_clientes .=  '"Cod_Postal":' . '"' . $array_clientes[$i]['Cod_Postal'] . '"' . ',';
		$string_clientes .=  '"Localidad":' . '"' . $array_clientes[$i]['Localidad'] . '"' . ',';
		$string_clientes .=  '"Provincia":' . '"' . $array_clientes[$i]['Provincia'] . '"' . ',';
		$string_clientes .=  '"Telefono1":' . '"' . $array_clientes[$i]['Telefono1'] . '"' . ',';
		$string_clientes .=  '"Telefono2":' . '"' . $array_clientes[$i]['Telefono2'] . '"' . ',';
		$string_clientes .=  '"NIF":' . '"' . $array_clientes[$i]['NIF'] . '"' . ',';
		$string_clientes .=  '"Observaciones":' . '"' . $array_clientes[$i]['Observaciones'] . '"' . ',';
		$string_clientes .=  '"Email":' . '"' . $array_clientes[$i]['Email'] . '"' . ',';
		$string_clientes .=  '"Moroso":' . '"' . $array_clientes[$i]['Moroso'] . '"';
		if($i == (count($array_clientes) - 1)){
			$string_clientes .= "}";
		} else {
			$string_clientes .= "},";
		}	
	}

	$string_clientes .= "]}";

	$fp = fopen("../services/clientes/clientes.txt", "w+");
	fwrite($fp, $string_clientes);
	fclose($fp);	
}
?>