<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");

$ID_SUPERVISOR = $_POST['ID_SUPERVISOR'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$OBSERVACIONES = $_POST['OBSERVACIONES'];
$ESTATUS = $_POST['ESTATUS'];

//INSERTA OBSERVACIONES DE UNA EVALUACION

$sql = ("INSERT INTO observaciones_evaluadores VALUES('$ID_SUPERVISOR', '$ID_EVALUACION', '$ID_CANDIDATO', '$OBSERVACIONES','$ESTATUS')");

	$conexion->set_charset("utf8");

	if ($conexion->query($sql) === TRUE) {
   	 	echo "true";
	} else {
    	echo "false";
}
$conexion->close();

?>