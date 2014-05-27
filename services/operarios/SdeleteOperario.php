<?php
echo $_SESSION[".."];
	include_once($_SESSION[".."]."/services/myBBDD.php");
	$mybd = new myBBDD();
	include($_SESSION[".."]."/modelo/MOperarios.php");
	$decision = "0";
	if(isset($_POST['hideOperario'])){
		$decision = $_POST['hideOperario'];
	}
	switch($decision){
		case "1":
			$dni = $_POST['listaDni'];
			deleteDatosOperarioxDNI($mybd, $dni);
			header('Location: ./tablaOperarios.php');
		break;
		default:
			$_SESSION['operarios2'] = getOperarios($mybd);
	}

?>