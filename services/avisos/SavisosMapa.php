<?php
session_start();
include_once("../myBBDD.php");
include("../../modelo/MAvisos.php");
$mybd = new myBBDD();
$_SESSION['avisos'] = getAvisos($mybd);
header('Location: ../../plantilla/mapaAvisos.php');

?>