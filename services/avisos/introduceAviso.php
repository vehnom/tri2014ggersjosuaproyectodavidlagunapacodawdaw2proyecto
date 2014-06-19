<?php
	session_start();

	include "myBBDD.php";
	include "getAvisos.php";

	$mybd = new myBBDD();

	$data_aviso = array();
	$data_factura = array();mapaLongitud

mapaLatitud
	if(isset($_POST['n_factura_provisinal_aviso'])){
		$nota_aviso = $_POST['nota_aviso'];
		$hora_aviso = $_POST['hora_aviso'];
		$tipo_trabajo_aviso = $_POST['tipo_trabajo_aviso'];
		$citado_por_aviso = $_POST['citado_por_aviso'];
		$fecha_entrada_aviso = $_POST['fecha_entrada_aviso'];
		$fecha_visita_aviso = $_POST['fecha_visita_aviso'];
		$estado_aviso = $_POST['estado_aviso'];

		$fecha_entrada_aviso = str_replace('T', ' ', $fecha_entrada_aviso);
		$fecha_visita_aviso = str_replace('T', ' ', $fecha_visita_aviso);
		
		$nivel_reclamacion_aviso = $_POST['nivel_reclamacion_aviso'];
		$id_cliente = 1;
		$procedencia_aviso = $_POST['procedencia_aviso'];
		$poliza_aviso = $_POST['poliza_aviso'];
		$aceptacion_aviso = 0;
		$cobrado_aviso = 0;
		$n_factura_provisinal_aviso = $_POST['n_factura_provisinal_aviso'];
		$requiere_profesional_aviso = $_POST['requiere_profesional_aviso'];
		$importe_aviso = $_POST['importe_aviso'];
		$importe_aviso = str_replace(',', '.', $importe_aviso);



		


		//Relleno el array que voy a pasar por parámetro a avisos


		$data_aviso['nota_aviso'] = $nota_aviso;
		$data_aviso['hora_aviso'] = $hora_aviso;
		$data_aviso['tipo_trabajo_aviso'] = $tipo_trabajo_aviso;
		$data_aviso['citado_por_aviso'] = $citado_por_aviso;
		$data_aviso['fecha_entrada_aviso'] = $fecha_entrada_aviso;
		$data_aviso['fecha_visita_aviso'] = $fecha_visita_aviso;
		$data_aviso['estado_aviso'] = $estado_aviso;
		$data_aviso['ultima_modificacion_por'] = $_SESSION['usuario'];

		//Relleno el array que voy a pasar por parámetro a facturas

		$data_factura['nivel_reclamacion_aviso'] = $nivel_reclamacion_aviso;
		$data_factura['id_cliente'] = $id_cliente;
		$data_factura['procedencia_aviso'] = $procedencia_aviso;
		$data_factura['poliza_aviso'] = $poliza_aviso;
		$data_factura['estado_aviso'] = $estado_aviso;
		$data_factura['tipo_trabajo_aviso'] = $tipo_trabajo_aviso;
		$data_factura['requiere_profesional_aviso'] = $requiere_profesional_aviso;
		$data_factura['importe_aviso'] = $importe_aviso;
		$data_factura['aceptacion_aviso'] = $aceptacion_aviso;
		$data_factura['cobrado_aviso'] = $cobrado_aviso;
		$data_factura['n_factura_provisinal_aviso'] = $n_factura_provisinal_aviso;
		$data_factura['hora_aviso'] = $hora_aviso;


		insertaFactura($data_factura, $mybd);

		$data_aviso['id_factura_aviso'] = dameIdFactura($mybd);

		insertaAviso($data_aviso, $mybd);

		actualizaAvisos($mybd);

		redirigeAvisos();


	}



	function insertaAviso($data_aviso, $mybd){
		$query = "INSERT INTO avisos (Id_Factura, Nota, Hora, Tipo_Trabajo, Citado_por, Fecha_Entrada, Fecha_Visitado, Id_Estado_Aviso, Ultima_Modificacion_Por) 
		VALUES (". $data_aviso['id_factura_aviso'] .",'" . $data_aviso['nota_aviso'] . "','" . $data_aviso['hora_aviso'] . "','". $data_aviso['tipo_trabajo_aviso'] ."','" . $data_aviso['citado_por_aviso'] . "','" . $data_aviso['fecha_entrada_aviso'] . "','" . $data_aviso['fecha_visita_aviso'] . "', " . $data_aviso['estado_aviso'] . ",'".$data_aviso['ultima_modificacion_por']."') ";
		echo $query;
		$resultado = $mybd -> insert($query);

		if($resultado){
			echo "Introducido";
		} else {
			echo "No introducido" . mysql_error($resultado);
		}
	}

	function insertaFactura($data_factura, $mybd){
		$query = "INSERT INTO facturas (Id_Nivel_Reclamacion, Id_Cliente, Procedencia, Poliza, Estado, Tipo_Trabajo, Requiere_Profesional, Importe, Aceptacion, Cobrado, NFac_Provisional, Hora) 
		VALUES ('" . $data_factura['nivel_reclamacion_aviso'] . "','" . $data_factura['id_cliente'] . "','". $data_factura['procedencia_aviso'] ."','" . $data_factura['poliza_aviso'] . "','" . $data_factura['estado_aviso'] . "','" . $data_factura['tipo_trabajo_aviso'] . "', '" . $data_factura['requiere_profesional_aviso'] . "'," . $data_factura['importe_aviso'] . ", " . $data_factura['aceptacion_aviso'] . ", " . $data_factura['cobrado_aviso'] . ", '" . $data_factura['n_factura_provisinal_aviso'] . "', '" . $data_factura['hora_aviso'] . "') ";
		echo $query;
		$resultado = $mybd -> insert($query);

		if($resultado){
			echo "Introducido";
		} else {
			echo "No introducido";
		}
	}

	function dameIdFactura($mybd){

		$query = "SELECT Id_Factura FROM facturas WHERE Id_Factura = (SELECT max(Id_Factura) from facturas)";

		$resultado = $mybd -> consulta($query);

		if($fila = mysql_fetch_assoc($resultado)){
			$idFactura = $fila['Id_Factura'];
		}

		return $idFactura;
	}

	function redirigeAvisos(){
		header("Location: ../plantilla/avisos.php");
	}

	


?>