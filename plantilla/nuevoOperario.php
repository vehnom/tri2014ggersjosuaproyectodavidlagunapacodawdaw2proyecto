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
					<form action="../services/operarios/insertOperario.php" method="post" id="formNuevoEmpleado" name="formNuevoEmpleado">
						<h2 style="font-size:60px; color: #aaa;"> Crear empleado </h2>
						<div class="thumb">
							<input type="text" id="idUsuario" name="idUsuario" placeholder="Identificador Usuario" required/> <br>
							<input type="text" id="nombre" name="nombre" placeholder="Nombre" required/> <br>
							<input type="text" id="apellido1" name="apellido1" placeholder="Primer apellido" required/> <br>
							<input type="text" id="apellido2" name="apellido2" placeholder="Segundo apellido" required/> <br>
							<input type="tel" id="telefono1" name="telefono1" placeholder="Telefono principal" maxlength="9" required onkeypress="return numeroTelefono(event);"/> <br>
							<input type="tel" id="telefono2" name="telefono2" placeholder="Telefono secundario" maxlength="9" required onkeypress="return numeroTelefono(event);"/> <br>
						</div>
						<div class="thumb thumb2">
							<input type="text" id="direccion" name="direccion" placeholder="Direccion" required/> <br>
							<input type="text" id="dni" name="dni" placeholder="DNI" maxlength="9" required onBlur="validarDNI(document.getElementById('dni').value);"/> <br>
							<input type="text" id="ss" name="ss" placeholder="Seg. Social" required/> <br>
							<textarea id="observaciones" name="observaciones" placeholder="Observaciones" required no-rezize></textarea> <br>
							<input type="text" id="foto" name="foto" placeholder="Foto" required/> <br>
							<input type="date" id="fecha" name="fecha" placeholder="Fecha Contratacion" required/> <br>
						</div>
						<div class="thumb thumb3">
							<input type="submit" id="enviar" name="enviar" value="Crear empleado" onClick="validarDNI(document.getElementById('dni').value);"/>	
						</div>
					</form>
				</center>
			</div>
		</div>
	</div>
</body>
</html>