<?php
	function getAvisos($mybd){
		$query = "SELECT * FROM clientes";
		$array_clientes = array();
		$result = $mybd -> consulta($query);
		while($fila = mysql_fetch_assoc($result)){
			array_push($array_clientes, $fila);
		}
		return $array_clientes;
	}
?>