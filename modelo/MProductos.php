<?php
	function getProductos($mybd){
		$query = "SELECT * FROM productos";
		$array_productos = array();
		$result = $mybd -> consulta($query);
		while($fila = mysql_fetch_assoc($result)){
			array_push($array_productos, $fila);
		}
		return $array_productos;
	}

	function getProductosxId($mybd, $id){
		$query = "SELECT * FROM productos WHERE Id_Producto = ".$id."";
		$result = $mybd -> consulta($query);
		if($fila = mysql_fetch_assoc($result)){
		return $fila;
		}
			
	}
	function deleteDatosProductoxId($mybd, $id){
		$query = "DELETE FROM productos WHERE Id_Producto='$id'";
		$result = $mybd -> delete($query);	
	}

	function insertDatosProductoForm($mybd){
		$nombre = $_POST['nombre'];
		$apellido1 = $_POST['apellido1'];
		$apellido2 = $_POST['apellido2'];
		$telefono1 = $_POST['telefono1'];
		$telefono2 = $_POST['telefono2'];
		$direccion = $_POST['direccion'];
		$dni = $_POST['dni'];
		$ss = $_POST['ss'];
		$observaciones = $_POST['observaciones'];
		$foto = $_POST['foto'];
		$fecha = $_POST['fecha'];
		
		$query = "INSERT INTO productos (Nombre, Apellido, Apellido2, Telefono, Telefono2, Direccion, DNI, Seg_Social, Observacion, Foto, Fecha_Alta) VALUES
		('$nombre', '$apellido1', '$apellido2', '$telefono1', '$telefono2', '$direccion', '$dni', '$ss', '$observaciones', '$foto', '$fecha')";
		
		$result = $mybd -> insert($query);
	}

	function updateDatosProducto($mybd,$idProducto,$nombre,$apellido1,$apellido2,$telefono1,$telefono2,$direccion,$dni,$ss,$observaciones,$foto,$fecha){
		$query = "UPDATE productos SET Nombre = '$nombre', Apellido = '$apellido1', Apellido2 = '$apellido2', Telefono = '$telefono1', Telefono2 = '$telefono2', Direccion = '$direccion', DNI = '$dni', Seg_Social = '$ss', Observacion = '$observaciones', Foto = '$foto', Fecha_Alta  = '$fecha' WHERE Id_Producto = '$idProducto'";
		$result = $mybd -> update($query);		
	}
?>