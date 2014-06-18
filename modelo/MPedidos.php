<?php
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
	function deleteDatosPedidoxId($mybd, $id){
		$query = "DELETE FROM pedidos WHERE Id_Pedido='$id'";
		$result = $mybd -> delete($query);	
	}

	function insertDatosPedidoForm($mybd){
		$carrito = $_POST['carrito_productos'];
		$seguimiento = $_POST['seguimiento_productos'];
		$hora = $_POST['hora_productos'];
		$cantidad = $_POST['cantidad_productos'];
		
		$query = "INSERT INTO `pedidos`(`Id_Pedido`, `Fecha`, `Seguimiento`, `Hora_Llamada`, `Cantidad`) VALUES ('','18-06-2014','$seguimiento','$hora','$cantidad')";
		
		$result = $mybd -> insert($query);
	}

	function updateDatosPedido($mybd,$idPedido,$nombre,$apellido1,$apellido2,$telefono1,$telefono2,$direccion,$dni,$ss,$observaciones,$foto,$fecha){
		$query = "UPDATE pedidos SET Nombre = '$nombre', Apellido = '$apellido1', Apellido2 = '$apellido2', Telefono = '$telefono1', Telefono2 = '$telefono2', Direccion = '$direccion', DNI = '$dni', Seg_Social = '$ss', Observacion = '$observaciones', Foto = '$foto', Fecha_Alta  = '$fecha' WHERE Id_Pedido = '$idPedido'";
		$result = $mybd -> update($query);		
	}
?>