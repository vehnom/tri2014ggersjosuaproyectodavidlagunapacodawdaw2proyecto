<?php
	include_once("../myBBDD.php");

	$mybd = new myBBDD();

	getDatosVehiculo($mybd);

	function getDatosVehiculo($mybd){
		$idVehiculo = $_POST['idVehiculo']; 
		$idOperario = $_POST['listaId'];
		$matricula = $_POST['matricula'];
		$marca = $_POST['marca'];
		$modelo = $_POST['modelo'];
		
		$query = "INSERT INTO flota_vehiculos (Id_Vehiculo, Id_Operario, Matricula, Marca, Modelo) VALUES
		($idVehiculo, '$idOperario', '$matricula', '$marca', '$modelo')";
		
		$result = $mybd -> insert($query);
		
		if($result == "1"){
			echo "<script type=\"text/javascript\">alert(\"Vehiculo creado correctamente.\");</script>";  
			
		}
		else{
			echo "<script type=\"text/javascript\">alert(\"Error al crear el vehiculo.\");</script>";  
		}
		
		header('Location: ../../plantilla/nuevoVehiculo.php'); 
		
	}
?>