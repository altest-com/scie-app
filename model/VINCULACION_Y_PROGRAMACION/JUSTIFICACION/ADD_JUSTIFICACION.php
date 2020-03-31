<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");

$ID_EVALUACION = $_POST['ID_EVALUACION'];
$FECHA_ANTIGUA = $_POST['FECHA_ANTIGUA'];
$FECHA_RECIENTE = $_POST['FECHA_RECIENTE'];
$DEPARTAMENTO  = $_POST['DEPARTAMENTO '];
$OBSERVACION = $_POST['OBSERVACION'];


$sql = ("INSERT INTO justificacion VALUES('$ID_EVALUACION', '$FECHA_ANTIGUA', '$FECHA_RECIENTE', '$DEPARTAMENTO', '$OBSERVACION')");

	$conexion->set_charset("utf8");

	if ($conexion->query($sql) === TRUE) {
   	 	echo "true";
	} else {
    	echo "false";
}
$conexion->close();

?>