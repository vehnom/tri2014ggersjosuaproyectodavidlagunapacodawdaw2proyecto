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
				<a href="tablaProveedores.php">
					<div class="thumb">
						<h2><i class="icon-search"></i></h2>
						<small>Ver Proveedores</small>
					</div>
				</a>
				<a href="nuevoProveedores.php">
					<div class="thumb">
						<h2><i class="icon-user-2"></i></h2>
						<small>Nuevo Proveedor</small>
					</div>
				</a>
				<!--<a href="editarOperario.php">
					<div class="thumb">
						<h2><i class="icon-pencil"></i></h2>
						<small>Editar Operario</small>
					</div>
				</a>-->
				<a href="borrarProveedores.php">
				<div class="thumb">
					<h2><i class="icon-remove"></i></h2>
					<small>Borrar Proveedor</small>
				</div>
				</a>
			</div>
		</div>
	</div>
</body>
</html>