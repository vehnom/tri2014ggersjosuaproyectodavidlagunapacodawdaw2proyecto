<?php
    include_once "../services/productos/getProductos.php";
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
	<link rel="stylesheet" type="text/css" href="../css/tabla.css">
	<script type="text/javascript" src="../js/jquery-2.1.0.js"></script>
	<script type="text/javascript" src="../js/desplegable.js"></script>
	<script type="text/javascript" src="../js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="../js/tabla_productos.js"></script>
</head>
<body>
	<?php include "sidebar.php" ?>
	<div id="contenido">
		<div id="contenido_prueba">
		<h2>Lista de Productos</h2>
		<hr style="margin-bottom: 25px;">
		<table id="tabla_operarios" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id_Producto</th>
                <th>Nombre</th>
                <th>Cantidad_Unidad</th>
                <th>Detalle</th>
                <th>Precio_Unidad</th>
                <th>Unidades_Existentes</th>
                <th>Fabricante</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>Id_Producto</th>
                <th>Nombre</th>
                <th>Cantidad_Unidad</th>
                <th>Detalle</th>
                <th>Precio_Unidad</th>
                <th>Unidades_Existentes</th>
                <th>Fabricante</th>
            </tr>
        </tfoot>
    </table>
		</div>
	</div>
</body>
</html>

<?php
    } else {
        header("Location: ./no_logeado.php");
    }
?>