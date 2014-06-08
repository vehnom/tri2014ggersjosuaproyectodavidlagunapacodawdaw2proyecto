<?php
	session_start();
	include_once($_SESSION[".."]."/services/myBBDD.php");
	$mybd = new myBBDD();
	include($_SESSION[".."]."/modelo/MVehiculo.php");
	$_SESSION['operariosVehiculo'] = getOperarios($mybd);
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
			<form class="form" id="form_insert_vehiculo" action="../services/flota/SinsertVehiculo.php" method="post">
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
							for($i = 0; $i < count($_SESSION['operariosVehiculo']); $i++){
								echo "<option value=" . $_SESSION['operariosVehiculo'][$i]["Id_Operario"] . ">" . $_SESSION['operariosVehiculo'][$i]["Nombre"] . " " . $_SESSION['operariosVehiculo'][$i]["Apellido"] . "</option>";
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
						<input style="width: 200px;" type="text" id="modelo" name="modelo" placeholder="Modelo" required/>
					</div>
				</div>
				
				<div class="form_input">
					<input type="submit" name="btn_insert_vehiculo" id="btn_insert_vehiculo" value="Guardar Cambios"/>
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