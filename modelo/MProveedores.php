<?php
	//session_start();
	function getProveedores($mybd){
		$query = "SELECT * FROM proveedores";
		$array_operarios = array();
		$result = $mybd -> consulta($query);
		while($fila = mysql_fetch_assoc($result)){
			array_push($array_operarios, $fila);
		}
		return $array_operarios;
	}

	function getProveedoresxId($mybd, $id){
		$query = "SELECT * FROM proveedores WHERE Id_Proveedor = ".$id."";
		$result = $mybd -> consulta($query);
		if($fila = mysql_fetch_assoc($result)){
		return $fila;
		}
			
	}
	function deleteDatosProveedorxId($mybd, $id){
		$query = "DELETE FROM proveedores WHERE Id_Proveedor='$id'";
		$result = $mybd -> delete($query);	
	}

	function insertDatosProveedorForm($mybd){
		$nombre = $_POST['nombre'];
		$apellido1 = $_POST['apellido1'];
		$apellido2 = $_POST['apellido2'];
		$nombreEmpresa = $_POST['nombreEmpresa'];
		$telefono1 = $_POST['telefono1'];
		$telefono2 = $_POST['telefono2'];
		$nif = $_POST['nif'];
		$direccion = $_POST['direccion'];
		$codPostal = $_POST['codPostal'];
		$localidad = $_POST['localidad'];
		$provincia = $_POST['provincia'];
		$referencias = $_POST['referencias'];
		$observaciones = $_POST['observaciones'];

		$query = "INSERT INTO `proveedores`( `Nombre`, `Apellido1`, `Apellido2`, `Nombre_Empresa`, `Telefono1`, `Telefono2`, `NIF`, `Direccion`, `Cod_Postal`, `Localidad`, `Provincia`, `Referencia`, `Observaciones`) VALUES('$nombre','$apellido1','$apellido2','$nombreEmpresa','$telefono1','$telefono2','$nif','$direccion','$codPostal','$localidad','$provincia','$referencias','$observaciones')";
		//$_SESSION["queryprueba"] = $query;
		$result = $mybd -> insert($query);
	}

	function updateDatosProveedor($mybd){
		$idProveedor = $_POST['idProveedor'];
		$nombre = $_POST['nombre'];
		$apellido1 = $_POST['apellido1'];
		$apellido2 = $_POST['apellido2'];
		$nombreEmpresa = $_POST['nombreEmpresa'];
		$telefono1 = $_POST['telefono1'];
		$telefono2 = $_POST['telefono2'];
		$nif = $_POST['nif'];
		$direccion = $_POST['direccion'];
		$codPostal = $_POST['codPostal'];
		$localidad = $_POST['localidad'];
		$provincia = $_POST['provincia'];
		$referencias = $_POST['referencias'];
		$observaciones = $_POST['observaciones'];

		$query = "UPDATE 'proveedores' SET 'Id_Proveedor'='$idProveedor','Nombre'='$nombre','Apellido1'='$apellido1','Apellido2'='$apellido2','Nombre_Empresa'='$nombreEmpresa','Telefono1'='$telefono1','Telefono2'='$telefono2','NIF'='$nif','Direccion'='$direccion','Cod_Postal'='$codPostal','Localidad'='$localidad','Provincia'='$provincia','Referencia'='$referencias','Observaciones'='$observaciones' WHERE Id_Proveedor = '$idProveedor'";
		$result = $mybd -> update($query);		
	}
?>