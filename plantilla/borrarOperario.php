<?php 
	session_start();
	include($_SESSION[".."]."/services/operarios/SdeleteOperario.php");
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
	function comprobar(){
		var borrarOperario = confirm('¿Realmente desea borra este operario?');
		if(borrarOperario == true){
			$("#hideOperario").val("1");
			document.formBorrar.submit();
		}else{
			$("#hideOperario").val("0");
		}
	}
</script>
</head>
<body>
	<?php include "sidebar.php" ?>
	<div id="contenido">
		<div id="contenido_thumbs">
			<div class="fila_thumbs">
				<center>
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="formBorrar" name="formBorrar">
						<input type="hidden" id="hideOperario" name="hideOperario" value="0">
						<h2> Borrar Operario </h2>
						<div class="thumb">
							<p> Listado Operarios </p>
							<select id="listaId" name="listaId">
							<?php

								for($i = 0; $i < count($_SESSION['operarios2']); $i++){	
									echo "<option value='" . $_SESSION['operarios2'][$i]["Id_Operario"] . "'>" . $_SESSION['operarios2'][$i]["Nombre"] . " " . $_SESSION['operarios2'][$i]["Apellido"] . "</option>";
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

<?php
	} else {
		header("Location: ./no_logeado.php");
	}
?>