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
	<link rel="stylesheet" type="text/css" href="../css/tabla.css">
	<script type="text/javascript" src="../js/jquery-2.1.0.js"></script>
	<script type="text/javascript" src="../js/desplegable.js"></script>
	<script type="text/javascript" src="../js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="../js/tabla_avisos.js"></script>
</head>
<body>
	<?php include "sidebar.php" ?>
	<div id="contenido">
		<div id="contenido_prueba">
		<h2>Tabla de avisos</h2>
		<hr style="margin-bottom: 25px;">
		<table id="tabla_avisos" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id_Aviso</th>
                <!-- <th>Id_Pedido</th>
                <th>Id_Factura</th> -->
                <th>Nota</th>
                <th>Quedada_dia</th>
                <th>Hora</th>
                <th>Tipo_Trabajo</th>
                <th>Citado_Por</th>
                <th>Fecha_Entrada</th>
                <th>Fecha_Visitado</th>
                <!-- <th>Coord_Longitud</th>
                <th>Coord_Latitud</th> -->
                <th>Id_Estado_Aviso</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>Id_Aviso</th>
                <!-- <th>Id_Pedido</th>
                <th>Id_Factura</th> -->
                <th>Nota</th>
                <th>Quedada_dia</th>
                <th>Hora</th>
                <th>Tipo_Trabajo</th>
                <th>Citado_Por</th>
                <th>Fecha_Entrada</th>
                <th>Fecha_Visitado</th>
                <!-- <th>Coord_Longitud</th>
                <th>Coord_Latitud</th> -->
                <th>Id_Estado_Aviso</th>
            </tr>
        </tfoot>
    </table>
		</div>
	</div>
</body>
</html>

<?php
    } else {
        echo "Debes estar logueado para poder entrar a la base de datos!<br>";
        echo "Redireccionando al login en 5 segundos...<br>";
?>

<script type='text/javascript'>setTimeout('location.href = "./index.php"',5000); </script>
<?php
        //echo "<meta http-equiv='Refresh' content='5'; url='index.php' />";
    }
?>