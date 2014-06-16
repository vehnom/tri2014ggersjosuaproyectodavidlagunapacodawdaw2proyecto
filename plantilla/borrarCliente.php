<?php
	session_start();
	include($_SESSION[".."]."/services/clientes/SdeleteCliente.php");
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
		var borrarCliente = confirm('¿Realmente desea borrar este cliente?');
		if(borrarCliente == true){
			$("#hideCliente").val("1");
			document.formBorrar.submit();
		}else{
			$("#hideCliente").val("0");
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
						<h2 style="font-size:60px; color: #aaa;"> Borrar Cliente </h2>
						<div class="thumb">
							<p> Listado clientes </p>
							<select id="listaCliente" name="listaCliente">
							<?php
								for($i = 0; $i < count($_SESSION['clientes']); $i++){	
									echo "<option value=" . $_SESSION['clientes'][$i]["Id_Cliente"] . ">" . $_SESSION['clientes'][$i]["NIF"] . " - " . $_SESSION['clientes'][$i]["Nombre"] .  " " . $_SESSION['clientes'][$i]["Apellido1"] . "</option>";
								}								
							?>
							</select>

							<br>
							<br>

							<input type="hidden" id="hideCliente" name="hideCliente">
						
							<input type="button" id="borrar" name="borrar" value="Borrar Cliente" onclick="comprobar();"/>
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