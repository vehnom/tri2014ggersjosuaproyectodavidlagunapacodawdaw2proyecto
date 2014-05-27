<?php
///$_SESSION[".."] MUESTRA LA RAIZ DEL FICHERO
	session_start();
	$raizHelper = dirname(__file__);
	$raizProyecto = dirname($raizHelper);
	$_SESSION[".."] = $raizProyecto;
?>