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
	<?php include "../plantilla/sidebar.php" ?>
	<div id="contenido">
		<div id="contenido_thumbs">
			<div class="fila_thumbs">
				<a href="tablaEmpleados.php">
					<div class="thumb">
						<h2><i class="icon-search"></i></h2>
						<small>Consultar empleados</small>
					</div>
				</a>
				<a href="nuevoEmpleado.php">
				<div class="thumb">
					<h2><i class="icon-user-2"></i></h2>
					<small>Nuevo empleado</small>
				</div>
				</a>

				<div class="thumb">
					<h2><i class="icon-pencil"></i></h2>
					<small>Editar empleado</small>
				</div>

				<div class="thumb">
					<h2><i class="icon-remove"></i></h2>
					<small>Borrar empleado</small>
				</div>
			</div>
		</div>
	</div>
</body>
</html>