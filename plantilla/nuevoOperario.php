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
		<div id="contenedor_form">
			<form class="form" id="form_nuevo_operario" action="../services/operarios/insertOperario.php" method="post">
				<h2> Crear operario </h2>
				<div id="form_col_izqda">
					<div class="form_input">
						<label for="idUsuario">Id Usuario: </label>
						<input style="width: 100px;" type="text" id="idUsuario" name="idUsuario" placeholder="Id usuario" required/>
					</div>
			
					<div class="form_input">
						<label for="nombre">Nombre: </label>
						<input style="width: 200px;" type="text" id="nombre" name="nombre" placeholder="Nombre" required/>
					</div>
					
					<div class="form_input">
						<label for="apellido1">Primer apellido: </label>
						<input style="width: 200px;" type="text" id="apellido1" name="apellido1" placeholder="Primer apellido" required/> <br>
					</div>

					<div class="form_input">
						<label for="apellido2">Segundo apellido: </label>
						<input style="width: 200px;" type="text" id="apellido2" name="apellido2" placeholder="Segundo apellido" required/> <br>
					</div>

					<div class="form_input">
						<label for="telefono1">Telefono principal: </label>
						<input style="width: 200px;" type="tel" id="telefono1" name="telefono1" placeholder="Telefono principal" maxlength="9" required onkeypress="return numeroTelefono(event);"/>
					</div>

					<div class="form_input">
						<label for="telefono2">Telefono secundario: </label>
						<input style="width: 200px;" type="tel" id="telefono2" name="telefono2" placeholder="Telefono secundario" maxlength="9" required onkeypress="return numeroTelefono(event);"/>
					</div>

					<div class="form_input">
						<label for="direccion">Direccion: </label>
						<input type="text" id="direccion" name="direccion" placeholder="Direccion" required/>
					</div>
					
					<div class="form_input">
						<label for="dni">DNI: </label>
						<input type="text" id="dni" name="dni" placeholder="DNI" maxlength="9" required onBlur="validarDNI(document.getElementById('dni').value);"/>
					</div>
				</div>
						
				<div id="form_col_dcha">
					<div class="form_input">
						<label for="ss">Nº Seguridad Social: </label>
						<input type="text" id="ss" name="ss" placeholder="Seg. Social" required/>
					</div>
				
					<div class="form_input">
						<label for="observaciones">Observaciones: </label>
						<textarea id="observaciones" name="observaciones" placeholder="Observaciones" required no-rezize></textarea>
					</div>
					
					<div class="form_input">
						<label for="foto">Foto: </label>
						<input type="file" id="foto" name="foto" placeholder="Foto" required/>
					</div>

					<div class="form_input">
						<label for="fecha">Fecha contratación: </label>
						<input type="date" id="fecha" name="fecha" placeholder="Fecha Contratacion" required/>
					</div>							
				</div>
				
				<div class="form_input">
					<input onclick="validaTodo();" type="button" name="btn_introducir_operario" id="btn_introducir_operario" value="Añadir" onClick="validarDNI(document.getElementById('dni').value);">
				</div>
			</form>
		</div>
	</div>
</body>
</html>