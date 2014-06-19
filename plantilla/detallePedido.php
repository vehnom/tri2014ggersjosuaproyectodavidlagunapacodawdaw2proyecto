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
	<script type="text/javascript" src="../js/pedidos.js"></script>
	<link href="../metro/min/iconFont.min.css" rel="stylesheet">
</head>
<body>
	<?php include "sidebar.php" ?>
	<div id="contenido">
		<div id="detalle_pedido">
			<h2 style="text-align: center;">Detalles del pedido</h2>
			<?php 
				$detalle = $_SESSION['detalle'];
				echo "<table class='tabla_detalle_pedido'>
						<tr>
							<th>Id Pedido</th><th>Id Producto</th><th>Unidades</th><th>Descuento</th><th>Total</th>
						</tr>";
				for($i = 0; $i < count($detalle); $i++){
					echo "
							
							<tr>
								<td>".$detalle[$i]['Id_Pedido']."</td><td>".$detalle[$i]['Id_Producto']."</td><td>".$detalle[$i]['Unidades']."</td><td>".$detalle[$i]['Descuento']."</td><td>".$detalle[$i]['Total']." euros</td>
							</tr>

						";
				}

				echo "</table>";
			?>
		</div>
	</div>
</body>
</html>

<?php
	} else {
		header("Location: ./no_logeado.php");
	}
?>