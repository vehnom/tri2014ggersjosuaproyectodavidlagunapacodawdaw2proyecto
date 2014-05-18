<?php
	include_once("../services/myBBDD.php");

	$mybd = new myBBDD();
	$array_dni = getDniOperarios($mybd);

	function getDniOperarios($mybd){
		$query = "SELECT DNI FROM operarios";
		$array_dni = array();
		$result = $mybd -> consulta($query);

		while($fila = mysql_fetch_assoc($result)){
			array_push($array_dni, $fila);
		}

		return $array_dni;
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
		<div id="contenido_thumbs">
			<div class="fila_thumbs">
				<center>
					<form action="../services/operarios/deleteOperario.php" method="post" id="formBorrarEmpleado" name="formBorrarEmpleado">
						<h2 style="font-size:60px; color: #aaa;"> Borrar empleado </h2>
						<div class="thumb">
							<p> Listado DNI </p>
							<select id="listaDni" name="listaDni">
							<?php
								for($i = 0; $i < count($array_dni); $i++){	
									echo "<option value=$array_dni[$i]>" . $array_dni[$i]['DNI'] . "</option>";
								}								
							?>
							</select>
						
							<br>
							<br>
						
							<input type="submit" id="borrar" name="borrar" value="Borrar Operario"/>
						</div>
					</form>
				</center>
			</div>
		</div>
	</div>
</body>
</html>