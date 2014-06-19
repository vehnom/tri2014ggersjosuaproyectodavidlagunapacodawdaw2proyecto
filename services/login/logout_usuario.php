<?php
session_start();

$decision = "0";

if(isset($_POST['cerrarSesion'])){
	$decision = $_POST['cerrarSesion'];
}

switch($decision){
	case "1":
		unset($_SESSION['usuario']);
		unset($_SESSION['logeado']);
		
		header("Location: ../../plantilla/index.php");
	break;
}
?>