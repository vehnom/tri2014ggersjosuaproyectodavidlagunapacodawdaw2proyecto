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
	function getDetallePedidosxId($mybd, $id){
		$query = "SELECT * FROM detalle_pedido WHERE Id_Pedido = ".$id."";
		$result = $mybd -> consulta($query);
		$array_pedidos = array();
		while($fila = mysql_fetch_assoc($result)){
			array_push($array_pedidos, $fila);
		}
		return $array_pedidos;
			
	}
	function deleteDatosPedidoxId($mybd, $id){
		$query = "DELETE FROM pedidos WHERE Id_Pedido='$id'";
		$query2 = "DELETE FROM detalle_pedido WHERE Id_Pedido='$id'";
		$result = $mybd -> delete($query);	
		$result = $mybd -> delete($query2);	
	}

	function insertDatosPedidoForm($mybd){
					
		$carrito = $_POST['carrito_productos'];
		$carrito = explode(" ", $carrito);
		$seguimiento = $_POST['seguimiento_productos'];
		$hora = $_POST['hora_productos'];
		$cantidad = count($carrito);
		$query = "INSERT INTO `pedidos`(`Id_Pedido`, `Fecha`, `Seguimiento`, `Hora_Llamada`, `Cantidad`) VALUES ('',CURDATE(),'$seguimiento','$hora','$cantidad')";
		$result = $mybd -> insert($query);
		$id = mysql_insert_id();

		for($i = 0; $i < count($carrito); $i++){
			if($carrito[$i] != ""){
				$producto_carrito = $carrito[$i];
				$producto_carrito = explode('-',$producto_carrito);
				$cantidadProducto = $producto_carrito[1];
				$idProducto = $producto_carrito[0];
				$query = "INSERT INTO `detalle_pedido`(`Id_Pedido`, `Id_Producto`, `Total`, `Unidades`, `Descuento`) VALUES ('$id','$idProducto',0,$cantidadProducto,0);";
				$result = $mybd -> insert($query);
			}
		}
	}

?>