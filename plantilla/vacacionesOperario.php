<?php
	session_start();
	include_once($_SESSION[".."]."/services/myBBDD.php");
	$mybd = new myBBDD();
	include($_SESSION[".."]."/modelo/MOperarios.php");
	$_SESSION['operarios'] = getOperarios($mybd);
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
			$("#btn_insert_vacaciones").on("click", function(){
				$("#hideVacaciones").val("1");
			});
		});
	</script>
</head>
<body>
	<?php include "sidebar.php" ?>
	<div id="contenido">
		<div id="contenedor_form">
			<form class="form" id="form_insert_vacaciones" action="../services/operarios/SinsertVacaciones.php" method="post">
				<h2> Vavaciones Operario </h2>
				<div id="form_col_center">
					<div class="form_input">
						<label for="id_Operario">ID Operario: </label>
						<select id="idOperario" name="idOperario">
						<?php
							for($i = 0; $i < count($_SESSION['operarios']); $i++){
								echo "<option value=" . $_SESSION['operarios'][$i]["Id_Operario"] . ">" . $_SESSION['operarios'][$i]["DNI"] . " - " . $_SESSION['operarios'][$i]["Nombre"] .  " " . $_SESSION['operarios'][$i]["Apellido"] . "</option>";
							}							
						?>
						</select>
					</div>

					<div class="form_input">
						<label for="fecha_inicio">Fecha Inicio: </label>
						<input style="width: 200px;" type="date" id="fecha_inicio" name="fecha_inicio" required/> <br>
					</div>
					
					<div class="form_input">
						<label for="fecha_fin">Fecha Fin: </label>
						<input style="width: 200px;" type="date" id="fecha_fin" name="fecha_fin" required/> <br>
					</div>
				</div>
				
				<div class="form_input">
					<input type="submit" name="btn_insert_vacaciones" id="btn_insert_vacaciones" value="Guardar Cambios"/>
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