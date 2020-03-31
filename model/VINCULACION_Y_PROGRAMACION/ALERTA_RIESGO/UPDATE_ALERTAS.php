<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");

$ID_EVALUACION = $_POST['ID_EVALUACION'];
$NUMERO_OFICIO = $_POST['NUMERO_OFICIO'];
$FECHA_OFICIO = $_POST['FECHA_OFICIO'];


$sql = "UPDATE evaluacion SET NUMERO_OFICIO = '$NUMERO_OFICIO', FECHA_OFICIO = '$FECHA_OFICIO' WHERE ID_EVALUACION = '$ID_EVALUACION' ";

	$conexion->set_charset("utf8");

	if ($conexion->query($sql) === TRUE) {
   	 	echo "true";
	} else {
    	echo "false";
}
$conexion->close(); 

?>