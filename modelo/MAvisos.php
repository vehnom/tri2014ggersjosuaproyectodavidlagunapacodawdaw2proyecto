<?php
	function getAvisos($mybd){
		$query = "SELECT * FROM avisos";
		$array_avisos = array();
		$result = $mybd -> consulta($query);
		while($fila = mysql_fetch_assoc($result)){
			array_push($array_avisos, $fila);
		}
		return $array_avisos;
	}
?>