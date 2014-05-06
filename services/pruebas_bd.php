<?php

	include_once("myBBDD.php");

	$mybd = new myBBDD();
	
	//PRUEBAS
	$res = dameNombres($mybd);
	insertaNombre('Pepito', $mybd);
	updateNombre(4, 'jejeje', $mybd);


	foreach($res as $fila){
		echo $fila . "<br>";
	}

	function dameNombres($mybd){
		
		$query = "SELECT * FROM prueba ORDER BY id_pruebas";
		$result = $mybd -> consulta($query);
		$resultado = array();

		while($row = mysql_fetch_assoc($result)){
			array_push($resultado, $row['nombre_pruebas']);
		}


		return $resultado;
	}


	function insertaNombre($nombre, $mybd){
		$query = "INSERT INTO prueba (nombre_pruebas) VALUES ('".$nombre."')";
		$result = $mybd -> insert($query);

		if($result){
			echo "Nombre: " . $nombre . " ha sido insertado <br>";
		} else {
			echo "Error al insertar el nombre <br>";
		}
	}

	function updateNombre($id, $nombre, $mybd){
		$query = "UPDATE prueba SET nombre_pruebas='" . $nombre . "' WHERE id_pruebas=" . $id;
		$result = $mybd -> update($query);

		if(@mysql_affected_rows() != 0){
			echo "Nombre con id: " . $id . " ha sido actualizado a: '" . $nombre . "' <br>";
		} else {
			echo "El nombre no se ha podido actualizar <br>";
		}
	}


?>