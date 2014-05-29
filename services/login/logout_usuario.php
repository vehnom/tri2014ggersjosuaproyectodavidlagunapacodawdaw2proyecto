<?php
session_start();

unset($_SESSION['usuario']);
unset($_SESSION['logeado']);

header("Location: ../../plantilla/index.php");
?>