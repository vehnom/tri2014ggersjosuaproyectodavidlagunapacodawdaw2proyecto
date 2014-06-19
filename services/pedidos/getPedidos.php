<?php
include_once("../services/myBBDD.php");

$mybd = new myBBDD();

actualizaPedidos($mybd);

function actualizaPedidos($mybd){
	$array_pedidos = getPedidos($mybd);
	escribePedidos($array_pedidos);
}



function getPedidos($mybd){
	$query = "SELECT * FROM pedidos";
	$array_pedidos = array();
	$result = $mybd -> consulta($query);

	while($fila = mysql_fetch_assoc($result)){
		array_push($array_pedidos, $fila);
	}

	return $array_pedidos;
}
function getPedidosxId($mybd, $id){
	$query = "SELECT * FROM pedidos WHERE Id_Pedido = ".$id."";
	$result = $mybd -> consulta($query);
	if($fila = mysql_fetch_assoc($result)){
	return $fila;
	}
		
}


function escribePedidos($array_pedidos){
	$string_pedidos = '';
	$string_pedidos .= '{ "data": [';
	


	for($i = 0; $i < count($array_pedidos); $i++){
		$string_pedidos .= '{';
		$string_pedidos .=  '"Id_Pedido":' . $array_pedidos[$i]['Id_Pedido'] . ',';
		$string_pedidos .=  '"Fecha":' . '"' . $array_pedidos[$i]['Fecha'] . '"' . ',';
		$string_pedidos .=  '"Seguimiento":' . '"' . $array_pedidos[$i]['Seguimiento'] . '"' . ',';
		$string_pedidos .=  '"Hora_Llamada":' . '"' . $array_pedidos[$i]['Hora_Llamada'] . '"' . ',';
		$string_pedidos .=  '"Cantidad":' . '"' . $array_pedidos[$i]['Cantidad'] . '"' . '';
		if($i == (count($array_pedidos) - 1)){
			$string_pedidos .= "}";
		} else {
			$string_pedidos .= "},";
		}
		
	}

	$string_pedidos .= "]}";

	//echo $string_pedidos;
	//$string_prueba = "jejeje";
	//Escribir en un archivo una nueva línea
	$fp = fopen("../services/pedidos/pedidos.txt", "w+");
	fwrite($fp, $string_pedidos);
	fclose($fp);
	
}
	


?>