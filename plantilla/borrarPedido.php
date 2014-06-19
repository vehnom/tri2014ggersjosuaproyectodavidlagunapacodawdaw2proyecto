<?php 
	session_start();
	include($_SESSION[".."]."/services/pedidos/SdeletePedido.php");
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
		var borrarPedido = confirm('¿Realmente desea borra este pedido?');
		if(borrarPedido == true){
			$("#hidePedido").val("1");
			document.formBorrar.submit();
		}else{
			$("#hidePedido").val("0");
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
						<input type="hidden" id="hidePedido" name="hidePedido" value="0">
						<h2> Borrar Pedido </h2>
						<div class="thumb">
							<p> Listado Pedidos </p>
							<select id="listaId" name="listaId">
							<?php
								for($i = 0; $i < count($_SESSION['pedidos']); $i++){	
									echo "<option value='" . $_SESSION['pedidos'][$i]["Id_Pedido"] . "'>" . $_SESSION['pedidos'][$i]["Id_Pedido"] . "</option>";
								}								
							?>
							</select>

							<br>
							<br>
						
							<input type="button" id="borrar" name="borrar" value="Borrar Pedido" onclick="comprobar();"/>
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