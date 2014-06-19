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
			<?php 
				$detalle = $_SESSION['detalle'];
				for($i = 0; $i < count($detalle); $i++){
					echo "<div>
							<span>Id_Pedido: ".$detalle[$i]['Id_Pedido']."</span>
							<span>Id_Producto: ".$detalle[$i]['Id_Producto']."</span>
							<span>Total: ".$detalle[$i]['Total']."</span>
							<span>Unidades: ".$detalle[$i]['Unidades']."</span>
							<span>Descuento: ".$detalle[$i]['Descuento']."</span>
						</div>";
				}
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