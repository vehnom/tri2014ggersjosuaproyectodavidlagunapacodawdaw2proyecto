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
			$("#btn_insert_proveedor").on("click", function(){
				$("#hideProveedor").val("1");
			});
		});
	</script>
</head>
<body>
	<?php include "sidebar.php" ?>
	<div id="contenido">
		<div id="contenedor_form">
			<form class="form" id="form_insert_proveedor" action="../services/proveedores/SinsertProveedor.php" method="post">
				<h2> Nuevo proveedor </h2>
				<div id="form_col_izqda">
					<input type="hidden" id="hideProveedor" name="hideProveedor" value="0">
			
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
						<label for="nombreEmpresa">Nombre Empresa: </label>
						<input style="width: 200px;" type="text" id="nombreEmpresa" name="nombreEmpresa" placeholder="Nombre Empresa" /> <br>
					</div>
					<div class="form_input">
						<label for="telefono1">Telefono principal: </label>
						<input style="width: 200px;" type="tel" id="telefono1" name="telefono1" placeholder="Telefono principal" maxlength="9"  onkeypress="return numeroTelefono(event);" required/>
					</div>

					<div class="form_input">
						<label for="telefono2">Telefono secundario: </label>
						<input style="width: 200px;" type="tel" id="telefono2" name="telefono2" placeholder="Telefono secundario" maxlength="9"  onkeypress="return numeroTelefono(event);"/>
					</div>

					<div class="form_input">
						<label for="nif">NIF: </label>
						<input type="text" id="nif" name="nif" placeholder="NIF" maxlength="10"  required/>
					</div>
					<div class="form_input">
						<label for="direccion">Direccion: </label>
						<input type="text" id="direccion" name="direccion" placeholder="Direccion"  required/>
					</div>
					<div class="form_input">
						<label for="localidad">Localidad: </label>
						<input type="text" id="localidad" name="localidad" placeholder="Localidad" />
					</div>
				</div>
				<div id="form_col_dcha">
					<div class="form_input">
						<label for="provincia">Provincia: </label>
						<input type="text" id="provincia" name="provincia" placeholder="Provincia" />
					</div>
					<div class="form_input">
						<label for="codPostal">Codigo Postal: </label>
						<input type="text" id="codPostal" name="codPostal" placeholder="Codigo Postal" />
					</div>
					<div class="form_input">
						<label for="observaciones">Observaciones: </label>
						<textarea id="observaciones" name="observaciones" placeholder="Observaciones" no-rezize></textarea>
					</div>
					<div class="form_input">
						<label for="referencias">Referencias: </label>
						<input type="text" id="referencias" name="referencias" placeholder="Referencias" />
					</div>
				</div>
				<div class="form_input">
					<input type="submit" name="btn_insert_proveedor" id="btn_insert_proveedor" value="Guardar Cambios">
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