<?php
	function getCategorias($mybd){
		$query = "SELECT * FROM categorias_productos";
		$array_categorias = array();
		$result = $mybd -> consulta($query);
		while($fila = mysql_fetch_assoc($result)){
			array_push($array_categorias, $fila);
		}
		return $array_categorias;
	}
?>