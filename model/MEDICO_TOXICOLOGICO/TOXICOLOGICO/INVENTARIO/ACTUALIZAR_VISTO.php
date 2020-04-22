<?php
header("Content-type: text/html; charset=utf8");
require("../../../conexion.php");
include_once "ConexionBD.php"; 
	$ID = $_POST['ID'];
	$cone = conectarBD();
	VISTO($cone,$ID); 
?>