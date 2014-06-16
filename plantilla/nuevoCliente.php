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
	<script type="text/javascript" src="../js/script.js"></script>
	<link href="../metro/min/iconFont.min.css" rel="stylesheet">
	<script type="text/javascript">
		$(document).ready(function(){
			$("#btn_insert_cliente").on("click", function(){
				$("#hideCliente").val("1");
			});
		});
	</script>
</head>
<body>
	<?php include "sidebar.php" ?>
	<div id="contenido">
		<div id="contenedor_form">
			<form class="form" id="form_insert_cliente" action="../services/clientes/SinsertCliente.php" method="post">
				<h2> Nuevo Cliente </h2>
				<div id="form_col_izqda">
					<input type="hidden" id="hideCliente" name="hideCliente" value="0">
			
					<div class="form_input">
						<label for="nombre">Nombre: </label>
						<input style="width: 200px;" type="text" id="nombre" name="nombre" placeholder="Nombre"  required/>
					</div>
					
					<div class="form_input">
						<label for="apellido1">Primer apellido: </label>
						<input style="width: 200px;" type="text" id="apellido1" name="apellido1" placeholder="Primer apellido"  required/> <br>
					</div>
					
					<div class="form_input">
						<label for="apellido2">Segundo apellido: </label>
						<input style="width: 200px;" type="text" id="apellido2" name="apellido2" placeholder="Segundo apellido" /> <br>
					</div>
					
					<div class="form_input">
						<label for="direccion">Direccion: </label>
						<input type="text" id="direccion" name="direccion" placeholder="Direccion"  required/>
					</div>
					
					<div class="form_input">
						<label for="codpostal">Código Postal: </label>
						<input type="text" id="cpostal" name="cpostal" placeholder="Codigo Postal"  required/>
					</div>
					
					<div class="form_input">
						<label for="localidad">Localidad: </label>
						<input type="text" id="localidad" name="localidad" placeholder="Localidad"  required/>
					</div>
					
					<div class="form_input">
						<label for="provincia">Provincia: </label>
						<input type="text" id="provincia" name="provincia" placeholder="Provincia"  required/>
					</div>
					
					<div class="form_input">
						<label for="telefono1">Telefono principal: </label>
						<input style="width: 200px;" type="tel" id="telefono1" name="telefono1" placeholder="Telefono principal" maxlength="9"  onkeypress="return numeroTelefono(event);" required/>
					</div>

					<div class="form_input">
						<label for="telefono2">Telefono secundario: </label>
						<input style="width: 200px;" type="tel" id="telefono2" name="telefono2" placeholder="Telefono secundario" maxlength="9"  onkeypress="return numeroTelefono(event);"/>
					</div>
				</div>
				<div id="form_col_dcha">
					<div class="form_input">
						<label for="dni">DNI: </label>
						<input type="text" id="dni" name="dni" placeholder="DNI" maxlength="9"  required/>
					</div>
				
					<div class="form_input">
						<label for="observaciones">Observaciones: </label>
						<textarea id="observaciones" name="observaciones" placeholder="Observaciones" no-rezize></textarea>
					</div>
					
					<div class="form_input">
						<label for="email">Email: </label>
						<input type="text" id="email" name="email" placeholder="Email" />
					</div>

					<div class="form_input">
						<label for="moroso">Moroso: </label>
						<select id="moroso" name="moroso">
							<option value="1"> SI </option>
							<option value="0"> NO </option>
						</select>
					</div>	
				</div>
				
				<div class="form_input">
					<input type="submit" name="btn_insert_cliente" id="btn_insert_cliente" value="Guardar Cambios">
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