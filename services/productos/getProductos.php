<?php
include_once("../services/myBBDD.php");

$mybd = new myBBDD();

actualizaProductos($mybd);

function actualizaProductos($mybd){
	$array_productos = getProductos($mybd);
	escribeProductos($array_productos);
}



function getProductos($mybd){
	$query = "SELECT * FROM productos";
	$array_productos = array();
	$result = $mybd -> consulta($query);

	while($fila = mysql_fetch_assoc($result)){
		array_push($array_productos, $fila);
	}

	return $array_productos;
}

function escribeProductos($array_productos){
	$string_productos = '';
	$string_productos .= '{ "data": [';
	


	for($i = 0; $i < count($array_productos); $i++){
		$string_productos .= '{';
		$string_productos .=  '"Id_Producto":' . $array_productos[$i]['Id_Producto'] . ',';
		$string_productos .=  '"Id_Categoria":' . $array_productos[$i]['Id_Categoria'] . ',';
		$string_productos .=  '"Id_Proveedor":' . '"' . $array_productos[$i]['Id_Proveedor'] . '"' . ',';
		$string_productos .=  '"Nombre":' . '"' . $array_productos[$i]['Nombre'] . '"' . ',';
		$string_productos .=  '"Cantidad_Unidad":' . '"' . $array_productos[$i]['Cantidad_Unidad'] . '"' . ',';
		$string_productos .=  '"Detalle":' . '"' . $array_productos[$i]['Detalle'] . '"' . ',';
		$string_productos .=  '"Precio_Unidad":' . '"' . $array_productos[$i]['Precio_Unidad'] . '"' . ',';
		$string_productos .=  '"Unidades_Existentes":' . '"' . $array_productos[$i]['Unidades_Existentes'] . '"' . ',';
		$string_productos .=  '"Precio_ESP":' . '"' . $array_productos[$i]['Precio_ESP'] . '"' . ',';
		$string_productos .=  '"Precio_COM":' . '"' . $array_productos[$i]['Precio_COM'] . '"' . ',';
		$string_productos .=  '"Fabricante":' . '"' . $array_productos[$i]['Fabricante'] . '"' . ',';
		$string_productos .=  '"CERC_CARP":' . '"' . $array_productos[$i]['CERC_CARP'] . '"';
		if($i == (count($array_productos) - 1)){
			$string_productos .= "}";
		} else {
			$string_productos .= "},";
		}
		
	}

	$string_productos .= "]}";

	//echo $string_productos;
	//$string_prueba = "jejeje";
	//Escribir en un archivo una nueva línea
	$fp = fopen("../services/productos/productos.txt", "w+");
	fwrite($fp, $string_productos);
	fclose($fp);
	
}
	


?>