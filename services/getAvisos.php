<?php
include_once("myBBDD.php");

$mybd = new myBBDD();

$array_avisos = getAvisos($mybd);
escribeAvisos($array_avisos);



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
	$string_avisos = "";
	$string_avisos .= "{ 'data': [";
	


	for($i = 0; $i < count($array_avisos); $i++){
		//echo  $array_avisos[$i]['Id_Aviso'] . " " . $array_avisos[$i]['Nota'] . "<br />";
		$string_avisos .= "{";
		$string_avisos .=  "'Id_Aviso:'" . $array_avisos[$i]['Id_Aviso'] . ",";
		$string_avisos .=  "'Id_Pedido:'" . $array_avisos[$i]['Id_Pedido'] . ",";
		$string_avisos .=  "'Id_Factura:'" . $array_avisos[$i]['Id_Factura'] . ",";
		$string_avisos .=  "'Nota:'" . $array_avisos[$i]['Nota'] . ",";
		$string_avisos .=  "'Quedada_dia:'" . $array_avisos[$i]['Quedada_dia'] . ",";
		$string_avisos .=  "'Hora:'" . $array_avisos[$i]['Hora'] . ",";
		$string_avisos .=  "'Tipo_Trabajo:'" . $array_avisos[$i]['Tipo_Trabajo'] . ",";
		$string_avisos .=  "'Citado_Por:'" . $array_avisos[$i]['Citado_Por'] . ",";
		$string_avisos .=  "'Fecha_Entrada:'" . $array_avisos[$i]['Fecha_Entrada'] . ",";
		$string_avisos .=  "'Fecha_Visitado:'" . $array_avisos[$i]['Fecha_Visitado'] . ",";
		$string_avisos .=  "'Coord_Longitud:'" . $array_avisos[$i]['Coord_Longitud'] . ",";
		$string_avisos .=  "'Coord_Latitud:'" . $array_avisos[$i]['Coord_Latitud'] . ",";
		$string_avisos .=  "'Id_Estado_Aviso:'" . $array_avisos[$i]['Id_Estado_Aviso'] . ",";
		$string_avisos .= "}";
	}

	$string_avisos .= "]}";

	//echo $string_avisos;
	//$string_prueba = "jejeje";
	//Escribir en un archivo una nueva línea
	$fp = fopen("avisos.txt", "w+");
	fwrite($fp, $string_avisos);
	fclose($fp);
	
}
	


?>