<?php
    include_once "../services/proveedores/getProveedores.php";
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
	<script type="text/javascript" src="../js/tabla_proveedores.js"></script>
</head>
<body>
	<?php include "sidebar.php" ?>
	<div id="contenido">
		<div id="contenido_prueba">
    		<h2>Lista de Proveedores</h2>
    		<hr style="margin-bottom: 25px;">
    		<table id="tabla_proveedores" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Id_Proveedor</th>
                        <th>Nombre</th>
                        <th>Apellido1</th>
                        <th>Apellido2</th>
                        <th>Nombre_Empresa</th>
                        <th>Telefono1</th>
                        <th>Telefono2</th>
                        <th>NIF</th>
                        <th>Direccion</th>
                        <th>Cod_Postal</th>
                        <th>Provincia</th>
                        <th>Referencia</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                    <tr>
                        <th>Id_Proveedor</th>
                        <th>Nombre</th>
                        <th>Apellido1</th>
                        <th>Apellido2</th>
                        <th>Nombre_Empresa</th>
                        <th>Telefono1</th>
                        <th>Telefono2</th>
                        <th>NIF</th>
                        <th>Direccion</th>
                        <th>Cod_Postal</th>
                        <th>Provincia</th>
                        <th>Referencia</th>
                        <th>Observaciones</th>
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