<?php
include_once("../services/myBBDD.php");
include("../../modelo/MAvisos.php");
$mybd = new myBBDD();

$array_avisos = getAvisos($mybd);
$_SESSION['avisos'] = $array_avisos;
print_r($_SESSION['avisos']);
//header('Location: ../../plantilla/mapaAvisos.php');

?>