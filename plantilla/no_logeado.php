<?php
	include("../helpers/CRaiz.php");
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
	<script type='text/javascript'>
		setTimeout('location.href = "../plantilla/index.php"',5000); 
	
		var myVar=setInterval(function(){cambiarValor()},1000);
		
		var restante = 5;
		
		function cambiarValor(){
			var tiempo = document.getElementById('tiempo');
		
			tiempo.innerHTML = "";
			
			restante--;
			
			tiempo.innerHTML = restante;
		}
	
	</script>
</head>

<div id="nombre_empresa">
	<img src="../images/empresa_login.png">
</div>
<div id="contenedor_login">
	<div id="inner_contenedor_login">
		<div class="error_login">Debes estar logeado para ver esta sección!<br>Redireccionando al login en <span id="tiempo">5</span> segundos...</div>
		
		<br><br><br>		
		
		<div class="error_login">Mientras tanto también puedes pulsar <a href="../tetris/tetris.html" target="_blank">aquí</a>.</div>
	</div>
</div>
</body>
</html>