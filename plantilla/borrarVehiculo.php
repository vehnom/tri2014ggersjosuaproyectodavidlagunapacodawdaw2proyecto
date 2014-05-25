<?php
	include_once("../services/myBBDD.php");

	$mybd = new myBBDD();
	$array_matricula = getMatriculaVehiculos($mybd);
	$array_marca = getMarcaVehiculos($mybd);
	$array_modelo = getModeloVehiculos($mybd);

	function getMatriculaVehiculos($mybd){
		$query = "SELECT MATRICULA FROM flota_vehiculos";
		$array_matricula = array();
		$result = $mybd -> consulta($query);

		while($fila = mysql_fetch_assoc($result)){
			array_push($array_matricula, $fila);
		}

		return $array_matricula;
	}
	
	function getMarcaVehiculos($mybd){
		$query = "SELECT MARCA FROM flota_vehiculos";
		$array_marca = array();
		$result = $mybd -> consulta($query);

		while($fila = mysql_fetch_assoc($result)){
			array_push($array_marca, $fila);
		}

		return $array_marca;
	}
	
	function getModeloVehiculos($mybd){
		$query = "SELECT MODELO FROM flota_vehiculos";
		$array_modelo = array();
		$result = $mybd -> consulta($query);

		while($fila = mysql_fetch_assoc($result)){
			array_push($array_modelo, $fila);
		}

		return $array_modelo;
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
	
<script type="text/javascript">
	function comprobar(){
		var borrarVehiculo = confirm('¿Realmente desea borra este vehiculo?');
	
		if(borrarVehiculo == true){
			document.formBorrar.submit();
		}
	}
</script>
</head>
<body>
	<?php include "sidebar.php" ?>
	<div id="contenido">
		<div id="contenido_thumbs">
			<div class="fila_thumbs">
				<center>
					<form action="../services/flota/deleteVehiculo.php" method="post" id="formBorrar" name="formBorrar">
						<h2 style="font-size:60px; color: #aaa;"> Borrar Vehiculo </h2>
						<div class="thumb">
							<p> Listado matriculas </p>
							<select id="listaMatricula" name="listaMatricula">
							<?php
								for($i = 0; $i < count($array_matricula); $i++){	
									echo "<option value=" . $array_matricula[$i]['MATRICULA'] . " id=" . $array_matricula[$i]['MATRICULA'] . " name=" .  $array_matricula[$i]['MATRICULA'] . ">" . $array_matricula[$i]['MATRICULA'] . " - " . $array_marca[$i]['MARCA'] .  " " . $array_modelo[$i]['MODELO'] . "</option>";
								}								
							?>
							</select>

							<br>
							<br>
						
							<input type="button" id="borrar" name="borrar" value="Borrar Vehiculo" onclick="comprobar();"/>
						</div>
					</form>
				</center>
			</div>
		</div>
	</div>
</body>
</html>