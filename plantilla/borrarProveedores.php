<?php 
	session_start();
	include($_SESSION[".."]."/services/proveedores/SdeleteProveedor.php");
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
		var borrarProveedor = confirm('¿Realmente desea borra este proveedor?');
		if(borrarProveedor == true){
			$("#hideProveedor").val("1");
			document.formBorrar.submit();
		}else{
			$("#hideProveedor").val("0");
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
						<input type="hidden" id="hideProveedor" name="hideProveedor" value="0">
						<h2 style="font-size:60px; color: #aaa;"> Borrar Proveedor </h2>
						<div class="thumb">
							<p> Listado Proveedores </p>
							<select id="listaId" name="listaId">
							<?php

								for($i = 0; $i < count($_SESSION['proveedores']); $i++){	
									echo "<option value='" . $_SESSION['proveedores'][$i]["Id_Proveedor"] . "'>" . $_SESSION['proveedores'][$i]["Nombre"] . " " . $_SESSION['proveedores'][$i]["Apellido"] . "</option>";
								}								
							?>
							</select>

							<br>
							<br>
						
							<input type="button" id="borrar" name="borrar" value="Borrar Proveedor" onclick="comprobar();"/>
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