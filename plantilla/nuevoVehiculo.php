<?php
	include_once("../services/myBBDD.php");

	$mybd = new myBBDD();
	$array_id = getIdOperarios($mybd);
	$array_nombre = getNombreOperarios($mybd);
	$array_apellidos = getApellidoOperarios($mybd);

	function getIdOperarios($mybd){
		$query = "SELECT Id_Operario FROM operarios";
		$array_id = array();
		$result = $mybd -> consulta($query);

		while($fila = mysql_fetch_assoc($result)){
			array_push($array_id, $fila);
		}

		return $array_id;
	}
	
	function getNombreOperarios($mybd){
		$query = "SELECT NOMBRE FROM operarios";
		$array_nombre = array();
		$result = $mybd -> consulta($query);

		while($fila = mysql_fetch_assoc($result)){
			array_push($array_nombre, $fila);
		}

		return $array_nombre;
	}
	
	function getApellidoOperarios($mybd){
		$query = "SELECT APELLIDO FROM operarios";
		$array_apellidos = array();
		$result = $mybd -> consulta($query);

		while($fila = mysql_fetch_assoc($result)){
			array_push($array_apellidos, $fila);
		}

		return $array_apellidos;
	}
?>

<!doctype html>
<html lang="es-ES">
<head>
	<meta charset="UTF-8">
	<title>Base de Datos Robles Portillo</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="../js/jquery-2.1.0.js"></script>
	<script type="text/javascript" src="../js/desplegable.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>
	<link href="../metro/min/iconFont.min.css" rel="stylesheet">
</head>
<body>
	<?php include "sidebar.php" ?>
	<div id="contenido">
		<div id="contenedor_form">
			<form class="form" id="form_nuevo_vehiculo" action="../services/flota/insertVehiculo.php" method="post">
				<h2> Crear Veh&iacute;culo </h2>
				<div id="form_col_center">
					<div class="form_input">
						<label for="idVehiculo">Id Veh&iacute;culo: </label>
						<input style="width: 100px;" type="text" id="idVehiculo" name="idVehiculo" placeholder="Id vehiculo" required/>
					</div>
			
					<div class="form_input">
						<label for="idOperario">Id Operario: </label>
						<select id="listaId" name="listaId">
						<?php
							for($i = 0; $i < count($array_id); $i++){
								echo "<option value=" . $array_id[$i]['Id_Operario'] . " id=" . $array_id[$i]['Id_Operario'] . " name=" . $array_id[$i]['Id_Operario'] . ">" . $array_nombre[$i]['NOMBRE'] . " " . $array_apellidos[$i]['APELLIDO'] . "</option>";
							}							
						?>
						</select>
					</div>
					
					<div class="form_input">
						<label for="matricula">Matr&iacute;cula: </label>
						<input style="width: 200px;" type="text" id="matricula" name="matricula" placeholder="Matricula" required/> <br>
					</div>

					<div class="form_input">
						<label for="marca">Marca: </label>
						<input style="width: 200px;" type="text" id="marca" name="marca" placeholder="Marca" required/> <br>
					</div>

					<div class="form_input">
						<label for="modelo">Modelo: </label>
						<input style="width: 200px;" type="tel" id="modelo" name="modelo" placeholder="Modelo" required/>
					</div>
				</div>
				
				<div class="form_input">
					<input type="submit" name="btn_introducir_vehiculo" id="btn_introducir_vehiculo" value="Añadir"/>
				</div>
			</form>
		</div>
	</div>
</body>
</html>