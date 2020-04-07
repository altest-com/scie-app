<?php
header("Content-Type: text/html;charset=utf-8");
include("../conexion.php");

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];



$sql = ("INSERT INTO asistencia_entrevista_psicologia VALUES('$ID_CANDIDATO','$ID_EVALUACION')");

	$conexion->set_charset("utf8");

	if ($conexion->query($sql) === TRUE) {
   	 	echo "true";
	} else {
    	echo "false";
}
$conexion->close();

?>