<?php

	include "../myBBDD.php";

	$mybd = new myBBDD();

	if(isset($_POST['btn_login'])){
		$usuario_form = $_POST['usuario'];
		$password_form = $_POST['password'];
	} else {
		header("Location: ../../plantilla/index.php");
	}

	$query = "SELECT * FROM usuario WHERE Nick = '" . $usuario_form . "' and Password = '" . $password_form . "'"; 

	$resultado = $mybd -> consulta($query);

	if(mysql_num_rows($resultado)>0){
		session_start();
		$_SESSION['usuario'] = $usuario_form;
		$_SESSION['logeado'] = 1;
		header("Location: ../../plantilla/inicio.php");
	} else {
		header("Location: ../../plantilla/error_login.php");
	}





?>