<?php 
	session_start();
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
</head>
<body>
	<?php include "sidebar.php" ?>
	<div id="contenido">
		<div id="contenedor_form_nuevo_aviso">
			<div id="contenido_thumbs">
				<div class="fila_thumbs">
					<form action="../services/operarios/updateOperario.php" method="post" id="formNuevoEmpleado" name="formNuevoEmpleado">
						<h2> Crear operario </h2>
						<div id="form_col_izqda">
							<div class="input_aviso">
								<label for="idUsuario">Id Usuario: </label>
								<input style="width: 100px;" type="text" id="idUsuario" name="idUsuario" placeholder="Id usuario" value="<?php echo $_SESSION['operario']['Id_Operario']; ?>" required disabled/>
							</div>
							<div class="input_aviso">
								<label for="nombre">Nombre: </label>
								<input style="width: 200px;" type="text" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $_SESSION['operario']['Nombre']; ?>" required/>
							</div>
							<div class="input_aviso">
								<label for="apellido1">Primer apellido: </label>
								<input style="width: 200px;" type="text" id="apellido1" name="apellido1" placeholder="Primer apellido" value="<?php echo $_SESSION['operario']['Apellido']; ?>" required/> <br>
							</div>
							<div class="input_aviso">
								<label for="apellido2">Segundo apellido: </label>
								<input style="width: 200px;" type="text" id="apellido2" name="apellido2" placeholder="Segundo apellido" value="<?php echo $_SESSION['operario']['Apellido2']; ?>" required/> <br>
							</div>
							<div class="input_aviso">
								<label for="telefono1">Telefono principal: </label>
								<input style="width: 200px;" type="tel" id="telefono1" name="telefono1" placeholder="Telefono principal" maxlength="9" value="<?php echo $_SESSION['operario']['Telefono']; ?>" required onkeypress="return numeroTelefono(event);"/>
							</div>
							<div class="input_aviso">
								<label for="telefono2">Telefono secundario: </label>
								<input style="width: 200px;" type="tel" id="telefono2" name="telefono2" placeholder="Telefono secundario" maxlength="9" value="<?php echo $_SESSION['operario']['Telefono2']; ?>" required onkeypress="return numeroTelefono(event);"/>
							</div>
							<div class="input_aviso">
								<label for="direccion">Direccion: </label>
								<input type="text" id="direccion" name="direccion" placeholder="Direccion" value="<?php echo $_SESSION['operario']['Direccion']; ?>" required/>
							</div>
							<div class="input_aviso">
								<label for="dni">DNI: </label>
								<input type="text" id="dni" name="dni" placeholder="DNI" maxlength="9" value="<?php echo $_SESSION['operario']['DNI']; ?>" required onBlur="validarDNI(document.getElementById('dni').value);"/>
							</div>
						</div>
						
						<div id="form_col_dcha">
							<div class="input_aviso">
								<label for="ss">Nº Seguridad Social: </label>
								<input type="text" id="ss" name="ss" placeholder="Seg. Social" value="<?php echo $_SESSION['operario']['Seg_Social']; ?>" required/>
							</div>
							<div class="input_aviso">
								<label for="observaciones">Observaciones: </label>
								<textarea id="observaciones" name="observaciones" placeholder="Observaciones" required no-rezize><?php echo $_SESSION['operario']['Observacion']; ?></textarea>
							</div>
							<div class="input_aviso">
								<label for="foto">Foto: </label>
								<input type="file" id="foto" name="foto" placeholder="Foto" value="<?php echo $_SESSION['operario']['Foto']; ?>" required/>
							</div>
							<div class="input_aviso">
								<label for="fecha">Fecha contratación: </label>
								<input type="date" id="fecha" name="fecha" placeholder="Fecha Contratacion" value="<?php echo $_SESSION['operario']['Fecha_Alta']; ?>" required/>
							</div>

							
						</div>
						<div class="input_aviso">
							<input style="text-align: center; float: left; margin-left: 320px;" type="submit" name="btn_introducir_aviso" id="enviar" value="Crear operario">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>