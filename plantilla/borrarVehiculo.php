<?php
	session_start();
	include($_SESSION[".."]."/services/flota/SdeleteVehiculo.php");
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
	function comprobar(){
		var borrarVehiculo = confirm('¿Realmente desea borra este vehiculo?');
		if(borrarVehiculo == true){
			$("#hideVehiculo").val("1");
			document.formBorrar.submit();
		}else{
			$("#hideVehiculo").val("0");
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
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="formBorrar" name="formBorrar">
						<h2> Borrar Vehiculo </h2>
						<div class="thumb">
							<p> Listado vehículos </p>
							<select id="listaMatricula" name="listaMatricula">
							<?php
								for($i = 0; $i < count($_SESSION['vehiculos2']); $i++){	
									echo "<option value=" . $_SESSION['vehiculos2'][$i]["Id_Vehiculo"] . ">" . $_SESSION['vehiculos2'][$i]["Matricula"] . " - " . $_SESSION['vehiculos2'][$i]["Marca"] .  " " . $_SESSION['vehiculos2'][$i]["Modelo"] . "</option>";
								}								
							?>
							</select>

							<br>
							<br>

							<input type="hidden" id="hideVehiculo" value="0">
						
							<input type="button" id="borrar" name="borrar" value="Borrar Vehiculo" onclick="comprobar();"/>
						</div>
					</form>
				</center>
			</div>
		</div>
	</div>
</body>
</html>

<?php
	} else {
		header("Location: ./no_logeado.php");
	}
?>