<?php

function getDatosCoche($id_vehiculo, $mybd){
	$query_get_vehiculo = "SELECT * FROM flota_vehiculos WHERE Id_Vehiculo = ".$id_vehiculo. "";
	$resultado_get_vehiculo = $mybd -> consulta($query_get_vehiculo);


	if($fila_get_vehiculo = mysql_fetch_assoc($resultado_get_vehiculo)){
		$datos_coche = $fila_get_vehiculo;
	}

	return $datos_coche;
}

function getItvCoche($id_vehiculo, $mybd){
	$datos_revision = "";

	$query_get_ultima_revision = "SELECT * FROM historial_itv WHERE Id_Vehiculo = ".$id_vehiculo. " ORDER BY Id_ITV DESC";
	echo "<script>console.log('".$query_get_ultima_revision."');</script>";
	$resultado_ultima_revision = $mybd -> consulta($query_get_ultima_revision);


	if($fila_ultima_revision = mysql_fetch_assoc($resultado_ultima_revision)){

		$id_itv_ultima_revision = $fila_ultima_revision['Id_ITV'];

		$query_get_revision = "SELECT * FROM itv WHERE Id_ITV = ". $id_itv_ultima_revision . "";

		$resultado_get_revision = $mybd -> consulta($query_get_revision);

		if($fila_get_revision = mysql_fetch_assoc($resultado_get_revision)){
			$datos_revision = $fila_get_revision;
		}
	}

	

	return $datos_revision;
}


?>