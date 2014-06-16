<?php
	session_start();
	include_once($_SESSION[".."]."/services/myBBDD.php");
	$mybd = new myBBDD();
	include($_SESSION[".."]."/modelo/MVehiculo.php");
	$_SESSION['vehiculos'] = getVehiculos($mybd);
	if(isset($_SESSION['logeado'])){
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
		$(document).ready(function(){
			$("#btn_insert_vehiculo").on("click", function(){
				$("#hideVehiculo").val("1");
			});
		});
	</script>
</head>
<body>
	<?php include "sidebar.php" ?>
	<div id="contenido">
		<div id="contenedor_form">
			<form class="form" id="form_insert_itv" action="../services/flota/SinsertItv.php" method="post">
				<h2> Pasar ITV </h2>
				<div id="form_col_center">		
					<div class="form_input">
						<label for="estado_Itv">Estado ITV: </label>
						<select id="estado" name="estado">
							<option value="pasada"> Pasada </option>
							<option value="no pasada"> No Pasada </option>
						</select>
					</div>
					
					<div class="form_input">
						<label for="fecha_itv">Fecha ITV: </label>
						<input style="width: 200px;" type="date" id="fecha" name="fecha" required/> <br>
					</div>
					
					<div class="form_input">
						<label for="id_Vehiculo">ID Vehiculo: </label>
						<select id="idVehiculo" name="idVehiculo">
						<?php
							for($i = 0; $i < count($_SESSION['vehiculos']); $i++){
								echo "<option value=" . $_SESSION['vehiculos'][$i]["Id_Vehiculo"] . ">" . $_SESSION['vehiculos'][$i]["Matricula"] . " - " . $_SESSION['vehiculos'][$i]["Marca"] .  " " . $_SESSION['vehiculos'][$i]["Modelo"] . "</option>";
							}							
						?>
						</select>
					</div>
				</div>
				
				<div class="form_input">
					<input type="submit" name="btn_insert_itv" id="btn_insert_itv" value="Guardar Cambios"/>
				</div>
			</form>
		</div>
	</div>
</body>
</html>

<?php
	} else {
		header("Location: ./no_logeado.php");
	}
?>