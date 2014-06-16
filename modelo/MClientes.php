<?php
	function getClientes($mybd){
		$query = "SELECT * FROM clientes";
		$array_clientes = array();
		$result = $mybd -> consulta($query);
		while($fila = mysql_fetch_assoc($result)){
			array_push($array_clientes, $fila);
		}
		return $array_clientes;
	}

	function getClientesxId($mybd, $id){
		$query = "SELECT * FROM clientes WHERE Id_Cliente = ".$id."";
		$result = $mybd -> consulta($query);
		if($fila = mysql_fetch_assoc($result)){
		return $fila;
		}
			
	}
	function deleteDatosCliente($mybd, $id){
		$query = "DELETE FROM clientes WHERE Id_Cliente=".$id;
		error_log($query);
		$result = $mybd -> delete($query);	
	}

	function insertDatosClienteForm($mybd){
		$nombre = $_POST['nombre'];
		$apellido1 = $_POST['apellido1'];
		$apellido2 = $_POST['apellido2'];
		$direccion = $_POST['direccion'];
		$cpostal = $_POST['cpostal'];
		$localidad = $_POST['localidad'];
		$provincia = $_POST['provincia'];
		$telefono1 = $_POST['telefono1'];
		$telefono2 = $_POST['telefono2'];
		$dni = $_POST['dni'];
		$observaciones = $_POST['observaciones'];
		$email = $_POST['email'];
		$moroso = $_POST['moroso'];
	
		$query = "INSERT INTO clientes (Nombre, Apellido1, Apellido2, Direccion, Cod_Postal, Localidad, Provincia, Telefono1, Telefono2, NIF, Observaciones, Email, Moroso) VALUES
		('$nombre', '$apellido1', '$apellido2', '$direccion', '$cpostal', '$localidad', '$provincia', '$telefono1', '$telefono2', '$dni', '$observaciones', '$email', '$moroso')";
		
		$result = $mybd -> insert($query);
	}

	function updateDatosCliente($mybd,$idCliente,$nombre,$apellido1,$apellido2,$telefono1,$telefono2,$direccion,$nif,$codPostal,$observaciones,$localidad,$provincia, $email, $moroso){
		$query = "UPDATE clientes SET Nombre = '$nombre', Apellido1 = '$apellido1', Apellido2 = '$apellido2', Telefono1 = '$telefono1', Telefono2 = '$telefono2', Direccion = '$direccion', NIF = '$nif', Observaciones = '$observaciones', Localidad = '$localidad', Provincia = '$provincia', Cod_Postal  = '$codPostal', Email  = '$email', Moroso  = '$moroso' WHERE Id_Cliente = '$idCliente'";
		$result = $mybd -> update($query);		
	}
?>