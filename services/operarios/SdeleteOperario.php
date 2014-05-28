<?php
	include_once($_SESSION[".."]."/services/myBBDD.php");
	$mybd = new myBBDD();
	include($_SESSION[".."]."/modelo/MOperarios.php");
	$decision = "0";
	if(isset($_POST['hideOperario'])){
		$decision = $_POST['hideOperario'];
	}
	switch($decision){
		case "1":
			$Id = $_POST['listaId'];
			deleteDatosOperarioxId($mybd, $Id);
			echo 'Location: '.$_SESSION[".."].'/plantilla/tablaOperarios.php';
			header('Location: '.$_SESSION[".."].'/plantilla/tablaOperarios.php');

		break;
		default:
			$_SESSION['operarios2'] = getOperarios($mybd);
	}
?>