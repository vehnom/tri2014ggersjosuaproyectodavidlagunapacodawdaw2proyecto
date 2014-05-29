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
			$("#btn_editar_proveedor").on("click", function(){
				$("#hideProveedor").val("1");
			});
		});
	</script>
</head>
<body>
	<?php include "sidebar.php" ?>
	<div id="contenido">
		<div id="contenedor_form">
			<form class="form" id="form_editar_proveedor" action="../services/proveedores/SeditarProveedor.php" method="post">
				<h2> Editar operario </h2>
				<div id="form_col_izqda">
					<input type="hidden" id="hideProveedor" name="hideProveedor" value="0">
					<div class="form_input">
						<label for="idUsuario">Id Usuario: </label>
						<input type="text" id="idUsuario" name="idUsuario" placeholder="Id usuario" value="<?php echo $_SESSION['proveedores']['Id_Operario']; ?>"/>
					</div>
			
					<div class="form_input">
						<label for="nombre">Nombre: </label>
						<input style="width: 200px;" type="text" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $_SESSION['proveedores']['Nombre']; ?>" required/>
					</div>
					
					<div class="form_input">
						<label for="apellido1">Primer apellido: </label>
						<input style="width: 200px;" type="text" id="apellido1" name="apellido1" placeholder="Primer apellido" value="<?php echo $_SESSION['proveedores']['Apellido']; ?>" required/> <br>
					</div>
					
					<div class="form_input">
						<label for="apellido2">Segundo apellido: </label>
						<input style="width: 200px;" type="text" id="apellido2" name="apellido2" placeholder="Segundo apellido" value="<?php echo $_SESSION['proveedores']['Apellido2']; ?>"/> <br>
					</div>

					<div class="form_input">
						<label for="telefono1">Telefono principal: </label>
						<input style="width: 200px;" type="tel" id="telefono1" name="telefono1" placeholder="Telefono principal" maxlength="9" value="<?php echo $_SESSION['proveedores']['Telefono']; ?>" onkeypress="return numeroTelefono(event);" required/>
					</div>

					<div class="form_input">
						<label for="telefono2">Telefono secundario: </label>
						<input style="width: 200px;" type="tel" id="telefono2" name="telefono2" placeholder="Telefono secundario" maxlength="9" value="<?php echo $_SESSION['proveedores']['Telefono2']; ?>" onkeypress="return numeroTelefono(event);"/>
					</div>

					<div class="form_input">
						<label for="direccion">Direccion: </label>
						<input type="text" id="direccion" name="direccion" placeholder="Direccion" value="<?php echo $_SESSION['proveedores']['Direccion']; ?>" required/>
					</div>

					<div class="form_input">
						<label for="dni">DNI: </label>
						<input type="text" id="dni" name="dni" placeholder="DNI" maxlength="9" value="<?php echo $_SESSION['proveedores']['DNI']; ?>" required onBlur="validarDNI(document.getElementById('dni').value);"/>
					</div>
				</div>
						
				<div id="form_col_dcha">
					<div class="form_input">
						<label for="ss">Nº Seguridad Social: </label>
						<input type="text" id="ss" name="ss" placeholder="Seg. Social" value="<?php echo $_SESSION['proveedores']['Seg_Social']; ?>" required/>
					</div>
					
					<div class="form_input">
						<label for="observaciones">Observaciones: </label>
						<textarea id="observaciones" name="observaciones" placeholder="Observaciones" no-rezize><?php echo $_SESSION['proveedores']['Observacion']; ?></textarea>
					</div>
					
					<div class="form_input">
						<label for="foto">Foto: </label>
						<input type="text" id="foto" name="foto" placeholder="Foto" value="<?php echo $_SESSION['proveedores']['Foto']; ?>"/>
					</div>

					<div class="form_input">
						<label for="fecha">Fecha contratación: </label>
						<input type="date" id="fecha" name="fecha" placeholder="Fecha Contratacion" value="<?php echo $_SESSION['proveedores']['Fecha_Alta']; ?>" required/>
					</div>	
				</div>
				
				<div class="form_input">
					<input type="submit" name="btn_editar_proveedor" id="btn_editar_proveedor" value="Guardar Cambios">
				</div>
			</form>
		</div>
	</div>
</body>
</html>

<?php
	} else {
		echo "Debes estar logueado para poder entrar a la base de datos!<br>";
		echo "Redireccionando al login en 5 segundos...<br>";
?>

<script type='text/javascript'>setTimeout('location.href = "./index.php"',5000); </script>
<?php
		//echo "<meta http-equiv='Refresh' content='5'; url='index.php' />";
	}
?>