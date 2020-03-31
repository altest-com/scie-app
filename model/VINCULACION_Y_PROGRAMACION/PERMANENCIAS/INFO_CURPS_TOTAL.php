<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 
include_once "ConexionBD.php";

$conexion= conectarBD();

	echo Consultar_TOTAL($conexion);

?>