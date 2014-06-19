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
	function insertDatosAvisoForm($mybd){
		$nota_aviso = $_POST['nota_aviso']; 
		$hora_aviso = $_POST['hora_aviso']; 
		$tipo_trabajo_aviso = $_POST['tipo_trabajo_aviso']; 
		$citado_por_aviso = $_POST['citado_por_aviso']; 
		$fecha_entrada_aviso = $_POST['fecha_entrada_aviso']; 
		$fecha_visita_aviso = $_POST['fecha_visita_aviso']; 
		$estado_aviso = $_POST['estado_aviso']; 
		$nivel_reclamacion_aviso = $_POST['nivel_reclamacion_aviso']; 
		$procedencia_aviso = $_POST['procedencia_aviso']; 
		$poliza_aviso = $_POST['poliza_aviso']; 
		$requiere_profesional_aviso = $_POST['requiere_profesional_aviso']; 
		$importe_aviso = $_POST['importe_aviso']; 
		$n_factura_provisinal_aviso = $_POST['n_factura_provisinal_aviso']; 
		$introducir_aviso_hidden = $_POST['introducir_aviso_hidden']; 
		$mapaLongitud = $_POST['mapaLongitud']; 
		$mapaLatitud = $_POST['mapaLatitud']; 
		
		$query = "INSERT INTO `avisos`(`Id_Aviso`, `Nota`, `Quedada_dia`, `Hora`, `Tipo_Trabajo`, `Citado_Por`,`Fecha_Entrada`, `Fecha_Visitado`, `Coord_Longitud`, `Coord_Latitud`, `Id_Estado_Aviso`) VALUES ('','$nota_aviso','$fecha_visita_aviso','$hora_aviso','$tipo_trabajo_aviso','$citado_por_aviso','$fecha_entrada_aviso','$fecha_visita_aviso','$mapaLongitud','$mapaLatitud','$estado_aviso')";

	/*'$nivel_reclamacion_aviso',
	'$procedencia_aviso',
	'$poliza_aviso',
	'$requiere_profesional_aviso',
	'$importe_aviso',
	'$n_factura_provisinal_aviso',
	'$introducir_aviso_hidden',*/

		$result = $mybd -> insert($query);
	}
?>