<?php
include_once("../services/myBBDD.php");

$mybd = new myBBDD();
	
actualizaAvisos($mybd);

function actualizaAvisos($mybd){
	$array_avisos = getAvisos($mybd);
	escribeAvisos($array_avisos);
}


function getAvisos($mybd){
	$query = "SELECT * FROM avisos";
	$array_avisos = array();
	$result = $mybd -> consulta($query);

	while($fila = mysql_fetch_assoc($result)){
		array_push($array_avisos, $fila);
	}

	return $array_avisos;
}

function escribeAvisos($array_avisos){
	$string_avisos = '';
	$string_avisos .= '{ "data": [';
	
	for($i = 0; $i < count($array_avisos); $i++){
		$string_avisos .= '{';
		$string_avisos .=  '"Id_Aviso":' . $array_avisos[$i]['Id_Aviso'] . ',';
		if($array_avisos[$i]['Id_Pedido'] != NULL){
			$string_avisos .=  '"Id_Pedido":' . $array_avisos[$i]['Id_Pedido'] . ',';
		} else {
			$string_avisos .=  '"Id_Pedido":' . '" "' . ',';
		}
		$string_avisos .=  '"Id_Factura":' . $array_avisos[$i]['Id_Factura'] . ',';
		if($array_avisos[$i]['Nota'] != NULL){
			$string_avisos .=  '"Nota":' . $array_avisos[$i]['Nota'] . ',';
		} else {
			$string_avisos .=  '"Nota":' . '" "' . ',';
		}
		$string_avisos .=  '"Quedada_dia":' . '"' . $array_avisos[$i]['Quedada_dia'] . '"' . ',';
		$string_avisos .=  '"Hora":' . '"' . $array_avisos[$i]['Hora'] . '"' . ',';
		if($array_avisos[$i]['Tipo_Trabajo'] != NULL){
			$string_avisos .=  '"Tipo_Trabajo":' . $array_avisos[$i]['Tipo_Trabajo'] . ',';
		} else {
			$string_avisos .=  '"Tipo_Trabajo":' . '" "' . ',';
		}
		if($array_avisos[$i]['Citado_Por'] != NULL){
			$string_avisos .=  '"Citado_Por":' . $array_avisos[$i]['Citado_Por'] . ',';
		} else {
			$string_avisos .=  '"Citado_Por":' . '" "' . ',';
		}
		$string_avisos .=  '"Fecha_Entrada":' . '"' . $array_avisos[$i]['Fecha_Entrada'] . '"' . ',';
		$string_avisos .=  '"Fecha_Visitado":' . '"' . $array_avisos[$i]['Fecha_Visitado'] . '"' . ',';
		if($array_avisos[$i]['Coord_Longitud'] != NULL){
			$string_avisos .=  '"Coord_Longitud":' . $array_avisos[$i]['Coord_Longitud'] . ',';
		} else {
			$string_avisos .=  '"Coord_Longitud":' . '" "' . ',';
		}
		if($array_avisos[$i]['Coord_Latitud'] != NULL){
			$string_avisos .=  '"Coord_Latitud":' . $array_avisos[$i]['Coord_Latitud'] . ',';
		} else {
			$string_avisos .=  '"Coord_Latitud":' . '" "' . ',';
		}
		$string_avisos .=  '"Id_Estado_Aviso":' . $array_avisos[$i]['Id_Estado_Aviso'] . '"' . ',';
		$string_avisos .=  '"Ultima_Modificacion_Por":' . '"' . $array_avisos[$i]['Ultima_Modificacion_Por'];
		if($i == (count($array_avisos) - 1)){
			$string_avisos .= "}";
		} else {
			$string_avisos .= "},";
		}
		
	}

	$string_avisos .= "]}";

	$fp = fopen("avisos.txt", "w+");
	fwrite($fp, $string_avisos);
	fclose($fp);
}
?>