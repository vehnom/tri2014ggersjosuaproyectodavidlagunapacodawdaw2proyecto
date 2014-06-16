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
			$("#btn_editar_cliente").on("click", function(){
				$("#hideCliente").val("1");
			});
		});
	</script>
</head>
<body>
	<?php include "sidebar.php" ?>
	<div id="contenido">
		<div id="contenedor_form">
			<form class="form" id="form_editar_cliente" action="../services/clientes/SeditarCliente.php" method="post">
				<h2> Editar operario </h2>
				<div id="form_col_izqda">
					<input type="hidden" id="hideCliente" name="hideCliente" value="0">
					<input type="hidden" name="idCliente" value="<?php echo $_SESSION['cliente']['Id_Cliente'] ?>">
			
					<div class="form_input">
						<label for="nombre">Nombre: </label>
						<input style="width: 200px;" type="text" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $_SESSION['cliente']['Nombre']; ?>" required/>
					</div>
					
					<div class="form_input">
						<label for="apellido1">Primer apellido: </label>
						<input style="width: 200px;" type="text" id="apellido1" name="apellido1" placeholder="Primer apellido" value="<?php echo $_SESSION['cliente']['Apellido1']; ?>" required/> <br>
					</div>
					
					<div class="form_input">
						<label for="apellido2">Segundo apellido: </label>
						<input style="width: 200px;" type="text" id="apellido2" name="apellido2" placeholder="Segundo apellido" value="<?php echo $_SESSION['cliente']['Apellido2']; ?>"/> <br>
					</div>

					<div class="form_input">
						<label for="telefono1">Telefono principal: </label>
						<input style="width: 200px;" type="tel" id="telefono1" name="telefono1" placeholder="Telefono principal" maxlength="9" value="<?php echo $_SESSION['cliente']['Telefono1']; ?>" onkeypress="return numeroTelefono(event);" required/>
					</div>

					<div class="form_input">
						<label for="telefono2">Telefono secundario: </label>
						<input style="width: 200px;" type="tel" id="telefono2" name="telefono2" placeholder="Telefono secundario" maxlength="9" value="<?php echo $_SESSION['cliente']['Telefono2']; ?>" onkeypress="return numeroTelefono(event);"/>
					</div>

					<div class="form_input">
						<label for="direccion">Direccion: </label>
						<input type="text" id="direccion" name="direccion" placeholder="Direccion" value="<?php echo $_SESSION['cliente']['Direccion']; ?>" required/>
					</div>

					<div class="form_input">
						<label for="nif">NIF: </label>
						<input type="text" id="nif" name="nif" placeholder="NIF" maxlength="9" value="<?php echo $_SESSION['cliente']['NIF']; ?>" required onBlur="validarDNI(document.getElementById('dni').value);"/>
					</div>

					<div class="form_input">
						<label for="codPostal">Codigo postal: </label>
						<input type="text" id="ss" name="codPostal" placeholder="Codigo postal" value="<?php echo $_SESSION['cliente']['Cod_Postal']; ?>" required/>
					</div>
				</div>
						
				<div id="form_col_dcha">
					
					
					<div class="form_input">
						<label for="localidad">Localidad: </label>
						<textarea id="localidad" name="localidad" placeholder="Localidad" no-rezize><?php echo $_SESSION['cliente']['Localidad']; ?></textarea>
					</div>
					
					<div class="form_input">
						<label for="provincia">Provincia: </label>
						<input type="text" id="provincia" name="provincia" placeholder="Provincia" value="<?php echo $_SESSION['cliente']['Provincia']; ?>"/>
					</div>

					<div class="form_input">
						<label for="email">Email: </label>
						<input type="text" id="email" name="email" placeholder="email" value="<?php echo $_SESSION['cliente']['Email']; ?>"/>
					</div>


					<div class="form_input">
						<label for="observaciones">Observaciones: </label>
						<textarea id="observaciones" name="observaciones" placeholder="observaciones" value="" required><?php echo $_SESSION['cliente']['Observaciones']; ?></textarea>
					</div>

					<div class="form_input">
						<label for="moroso">Moroso: </label>
						<select name="moroso" id="moroso">
							
						
							<?php
								if($_SESSION['cliente']['Moroso'] == 1){
									echo '<option value="1" selected="selected">Si</option>';
									echo '<option value="0">No</option>';
								} else {
									echo '<option value="1">Si</option>';
									echo '<option value="0" selected="selected">No</option>';
								}
							?>
						</select>
					</div>	
				</div>
				
				<div class="form_input">
					<input type="submit" name="btn_editar_cliente" id="btn_editar_cliente" value="Guardar Cambios">
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