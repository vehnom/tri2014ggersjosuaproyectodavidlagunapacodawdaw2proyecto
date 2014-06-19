<?php
	session_start();
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
	<link href="../metro/min/iconFont.min.css" rel="stylesheet">
</head>
<body>
	<?php include "sidebar.php" ?>
	<div id="contenido">
		<div id="contenido_thumbs">
			<div class="fila_thumbs">
				<a href="../services/avisos/SavisosMapa.php">
					<div class="thumb">
						<h2><i class="icon-clipboard-2"></i></h2>
						<small>Avisos</small>
					</div>
				</a>
				
				<a href="nuevoAviso.php">
					<div class="thumb">
						<h2><i class="icon-pencil"></i></h2>
						<small>Nuevo Aviso</small>
					</div>
				</a>
				
				<a href="pedidos.php">
					<div class="thumb">
						<h2><i class="icon-files"></i></h2>
						<small>Pedidos</small>
					</div>
				</a>

				<a href="tablaVehiculos.php">
					<div class="thumb">
						<h2><i class="icon-cars"></i></h2>
						<small>Flota Veh&iacute;culos</small>
					</div>
				</a>
				<a href="tablaProductos.php">
					<div class="thumb">
						<h2><i class="icon-book"></i></h2>
						<small>Productos</small>
					</div>
				</a>
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
