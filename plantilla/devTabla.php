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
	<script type="text/javascript" src="../js/tabla.js"></script>
</head>
<body>
	<?php include "../plantilla/sidebar.php" ?>
	<div id="contenido">
		<div id="contenido_prueba">
		<h2>Tabla Prueba</h2>
		<hr style="margin-bottom: 25px;">
		<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Extn.</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Extn.</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>
		</div>
	</div>
</body>
</html>