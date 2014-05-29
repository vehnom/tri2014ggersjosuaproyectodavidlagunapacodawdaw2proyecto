<?php
	include("../helpers/CRaiz.php");
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
</head>
	
<div id="contenedor_login">
	<div id="inner_contenedor_login">
		<form id="form_login" name="form_login" method="post" action="../services/login/loguear_usuario.php">
			<div class="input_login first_input_login">
				<label for="usuario">Usuario</label>
				<input type="text" name="usuario" id="usuario">
			</div>
			<div class="input_login">
				<label for="password">Contrase&ntilde;a</label>
				<input type="password" name="password" id="password">
			</div>
			<div class="input_login">
				<input type="submit" name="btn_login" id="btn_login">
			</div>
		</form>
	</div>

</div>

</body>
</html>