<?php
header("Content-type: text/html; charset=utf8");
require("../../conexion.php"); 

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$TRAYECTORIA_LABORAL = $_POST['TRAYECTORIA_LABORAL'];
$SITUACION_PATRIMONIAL = $_POST['SITUACION_PATRIMONIAL'];
$OBSERVACIONES = $_POST['OBSERVACIONES'];
$SINTESIS_TECNICA = $_POST['SINTESIS_TECNICA'];
$RESULTADO = $_POST['RESULTADO'];


$sql = ("INSERT INTO resultado_reexaminacion VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$TRAYECTORIA_LABORAL' ,'$SITUACION_PATRIMONIAL', '$OBSERVACIONES', '$SINTESIS_TECNICA','$RESULTADO')");

	$conexion->set_charset("utf8");

	if ($conexion->query($sql) === TRUE) {
   	 	echo "true";
	} else {
    	echo "false";
}
$conexion->close();

?>