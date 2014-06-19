<?php
	session_start();
	include_once($_SESSION[".."]."/services/myBBDD.php");
	include_once($_SESSION[".."]."/services/flota/getITV.php");
	$mybd = new myBBDD();
	include($_SESSION[".."]."/modelo/MVehiculo.php");
	$_SESSION['vehiculos'] = getVehiculos($mybd);
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
			$("#btn_insert_vehiculo").on("click", function(){
				$("#hideVehiculo").val("1");
			});
		});
	</script>
</head>
<body>
	<?php include "sidebar.php" ?>
	<div id="contenido">
		<div id="contenedor_form">
			<form class="form" id="form_insert_itv" action="../services/flota/SinsertItv.php" method="post">
				<h2> Próximas ITVs </h2>
				<?php 
					if(isset($_GET['id_vehiculo'])){
						$fila_coche = getDatosCoche($_GET['id_vehiculo'], $mybd);
						$fila_itv = getItvCoche($_GET['id_vehiculo'], $mybd);
					} 
				?>
				<table>
					<tr>
						<td>Matricula</td><td>Marca</td><td>Modelo</td><td>Estado ITV</td><td>Fecha</td>
					</tr>
					<tr>
						<td><?php echo $fila_coche['Matricula'] ?></td><td><?php echo $fila_coche['Marca'] ?></td><td><?php echo $fila_coche['Modelo'] ?></td><td><?php echo $fila_itv['Estado'] ?></td><td><?php echo $fila_itv['Fecha_Pasar_ITV'] ?></td>
					</tr>
				</table>
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