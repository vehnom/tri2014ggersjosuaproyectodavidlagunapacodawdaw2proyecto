<!doctype html>
<html lang="es-ES">
<head>
	<meta charset="UTF-8">
	<title>Base de Datos Robles Portillo</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="../js/jquery-2.1.0.js"></script>
	<script type="text/javascript" src="../js/desplegable.js"></script>
	<link href="../metro/min/iconFont.min.css" rel="stylesheet">

	<script type="text/javascript">
		function validaTodo(){
			var valida = true;

			var nota_aviso = document.getElementById('nota_aviso').value;
			var hora_aviso = document.getElementById('hora_aviso').value;
			var tipo_trabajo_aviso = document.getElementById('tipo_trabajo_aviso').value;
			var citado_por_aviso = document.getElementById('citado_por_aviso').value;
			var fecha_entrada_aviso = document.getElementById('fecha_entrada_aviso').value;
			var fecha_visita_aviso = document.getElementById('fecha_visita_aviso').value;
			var estado_aviso = document.getElementById('estado_aviso').value;
			var nivel_reclamacion_aviso = document.getElementById('nivel_reclamacion_aviso').value;
			var procedencia_aviso = document.getElementById('procedencia_aviso').value;
			var poliza_aviso = document.getElementById('poliza_aviso').value;
			var requiere_profesional_aviso = document.getElementById('requiere_profesional_aviso').value;
			var importe_aviso = document.getElementById('importe_aviso').value;
			var n_factura_provisinal_aviso = document.getElementById('n_factura_provisinal_aviso').value;

			if(!nota_aviso.length > 0) valida = false; document.getElementById('valida_nota_aviso').innerHTML="<span style='color: red;'>Incorrecto</span>";
		}
	</script>

</head>
<body>
	<?php include "sidebar.php" ?>
	<div id="contenido">
		<div id="contenedor_form_nuevo_aviso">
			<form id="form_nuevo_aviso" method="post" action="../services/introduceAviso.php">
				<h2>Nuevo Aviso</h2>
				<div id="form_col_izqda">
					<div class="input_aviso">
						<label for="nota_aviso">Nota: </label>
						<textarea style="width: 200px;" id="nota_aviso" name="nota_aviso" placeholder="ej: Se han quedado encerrados... "></textarea>
						<div id="valida_nota_aviso"></div>
					</div>
					<div class="input_aviso">
						<label for="hora_aviso">Hora: </label>
						<input type="time" id="hora_aviso" name="hora_aviso">
					</div>
					<div class="input_aviso">
						<label for="tipo_trabajo_aviso">Tipo de Trabajo: </label>
						<select id="tipo_trabajo_aviso" name="tipo_trabajo_aviso" class="tipo_trabajo_aviso">
							<option value="Cerrajeria">Cerrajeria</option>
							<option value="Carpinteria">Carpinteria</option>
						</select>
					</div>

					<div class="input_aviso">
						<label for="citado_por_aviso">Citado por: </label>
						<select id="citado_por_aviso" name="citado_por_aviso" class="citado_por_aviso">
							<option value="Paco">Paco</option>
							<option value="Felipe">Felipe</option>
						</select>
					</div>

					<div class="input_aviso">
						<label for="fecha_entrada_aviso">Fecha de entrada: </label>
						<input type="datetime-local" id="fecha_entrada_aviso" name="fecha_entrada_aviso">
					</div>

				</div>
				<div id="form_col_dcha">
					<div class="input_aviso">
						<label for="fecha_visita_aviso">Fecha de visita: </label>
						<input type="datetime-local" id="fecha_visita_aviso" name="fecha_visita_aviso">
					</div>

					<div class="input_aviso">
						<label for="estado_aviso">Estado del aviso: </label>
						<select id="estado_aviso" name="estado_aviso" class="estado_aviso">
							<option value="1">Sigue</option>
							<option value="0">Terminado</option>
						</select>
					</div>

					<div class="input_aviso">
						<label for="nivel_reclamacion_aviso">Nivel de reclamación del aviso: </label>
						<select id="nivel_reclamacion_aviso" name="nivel_reclamacion_aviso" class="nivel_reclamacion_aviso">
							<option value="0">Normal</option>
							<option value="1">Urgente</option>
							<option value="2">Muy urgente</option>
						</select>
					</div>

					<div class="input_aviso">
						<label for="procedencia_aviso">Procedencia del aviso: </label>
						<select id="procedencia_aviso" name="procedencia_aviso" class="procedencia_aviso">
							<option value="AXA">AXA</option>
							<option value="Particular">Particular</option>
							<option value="Otros">Otros</option>
						</select>
					</div>

					<div class="input_aviso">
						<label for="poliza_aviso">Póliza: </label>
						<input type="text" id="poliza_aviso" name="poliza_aviso">
					</div>

					<div class="input_aviso">
						<label for="requiere_profesional_aviso">Requiere profesional: </label>
						<select id="requiere_profesional_aviso" name="requiere_profesional_aviso" class="requiere_profesional_aviso">
							<option value="Si">Si</option>
							<option value="No">No</option>
						</select>
					</div>

					<div class="input_aviso">
						<label for="importe_aviso">Importe (Euros): </label>
						<input type="text" id="importe_aviso" name="importe_aviso" placeholder="ej: 58,65">
					</div>

					<div class="input_aviso">
						<label for="n_factura_provisinal_aviso">Nº Factura provisional: </label>
						<input type="text" id="n_factura_provisinal_aviso" name="n_factura_provisinal_aviso">
					</div>
				</div>
				<div class="input_aviso">
					<input onclick="validaTodo();" type="button" name="btn_introducir_aviso" id="btn_introducir_aviso" value="Añadir">
				</div>
				
			</form>
		</div>
	</div>
</body>
</html>