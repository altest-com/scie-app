<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$COMENTARIOS = $_POST['COMENTARIOS'];

//INSERTA OBSERVACIONES DE UNA EVALUACION

$sql = ("INSERT INTO eval_observaciones VALUES('$ID_CANDIDATO', '$ID_EVALUACION', '$COMENTARIOS')");

	$conexion->set_charset("utf8");

	if ($conexion->query($sql) === TRUE) {
   	 	echo "true";
	} else {
    	echo "false";
}
$conexion->close();

?>