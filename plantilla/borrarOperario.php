<?php 
	session_start();
	include("../services/operarios/SdeleteOperario.php");
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
	function comprobar(){
		var borrarOperario = confirm('¿Realmente desea borra este operario?');
		if(borrarOperario == true){
			document.formBorrar.submit();
		}else{
			$("#hideOperario").val("0");
		}
	}
	$(document).ready(function(){
		$("#btn_editar_operario").on("click", function(){
			$("#hideOperario").val("1");
		});
	});
</script>
</head>
<body>
	<?php include "sidebar.php" ?>
	<div id="contenido">
		<div id="contenido_thumbs">
			<div class="fila_thumbs">
				<center>
					<form action="../services/operarios/SdeleteOperario.php" method="post" id="formBorrar" name="formBorrar">
						<input type="hidden" id="hideOperario" name="hideOperario" value="0">
						<h2 style="font-size:60px; color: #aaa;"> Borrar Operario </h2>
						<div class="thumb">
							<p> Listado DNI </p>
							<select id="listaDni" name="listaDni">
							<?php

								for($i = 0; $i < count($_SESSION['operarios2']); $i++){	
									echo "<option value='" . $_SESSION['operarios2'][$i]["Id_Usuario"] . "'>" . $_SESSION['operarios2'][$i]["Nombre"] . " " . $_SESSION['operarios2'][$i]["Apellido"] . "</option>";
								}								
							?>
							</select>

							<br>
							<br>
						
							<input type="button" id="borrar" name="borrar" value="Borrar Operario" onclick="comprobar();"/>
						</div>
					</form>
				</center>
			</div>
		</div>
	</div>
</body>
</html>
