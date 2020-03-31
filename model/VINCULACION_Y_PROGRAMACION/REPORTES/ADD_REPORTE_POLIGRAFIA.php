<?php
header("Content-type: text/html; charset=utf8");
require("../../conexion.php"); 
include_once "ConexionBD.php";

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$TRAYECTORIA_LABORAL = $_POST['TRAYECTORIA_LABORAL'];
$ADMISIONES = $_POST['ADMISIONES'];
$SITUACION_PATRIMONIAL = $_POST['SITUACION_PATRIMONIAL'];
$OBSERVACIONES = $_POST['OBSERVACIONES'];
$SINTESIS_TECNICA = $_POST['SINTESIS_TECNICA'];
$PREGUNTAS = $_POST['PREGUNTAS'];
$OTRA_PREGUNTA = $_POST['OTRA_PREGUNTA'];
$RESULTADO = $_POST['RESULTADO'];
$conex = conectarBD();
if($TRAYECTORIA_LABORAL == ""){
	if(Verificar_reportePol($conex,$ID_CANDIDATO,$ID_EVALUACION)=="incorrecto"){
		$sql = ("INSERT INTO reporte_poligrafia VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$TRAYECTORIA_LABORAL' ,'$SITUACION_PATRIMONIAL', '$OBSERVACIONES', '$SINTESIS_TECNICA','$PREGUNTAS','$RESULTADO', '$OTRA_PREGUNTA', '$ADMISIONES')");

			$conexion->set_charset("utf8");

			if ($conexion->query($sql) === TRUE) {
		   	 	echo "true";
			} else {
		    	echo "false";
		}
	}
	else{
		$sql = ("UPDATE reporte_poligrafia SET RESULTADO = '$RESULTADO'");

			$conexion->set_charset("utf8");

			if ($conexion->query($sql) === TRUE) {
		   	 	echo "true";
			} else {
		    	echo "false";
		}
	}
}
else{
	$sql = ("DELETE FROM reporte_poligrafia WHERE ID_EVALUACION='$ID_EVALUACION'");

		$conexion->set_charset("utf8");

		if ($conexion->query($sql) === TRUE) {
	   	 	echo "true";
		} else {
	    	echo "false";
	}

	$sql = ("INSERT INTO reporte_poligrafia VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$TRAYECTORIA_LABORAL' ,'$SITUACION_PATRIMONIAL', '$OBSERVACIONES', '$SINTESIS_TECNICA','$PREGUNTAS','$RESULTADO', '$OTRA_PREGUNTA', '$ADMISIONES')");

		$conexion->set_charset("utf8");

		if ($conexion->query($sql) === TRUE) {
	   	 	echo "true";
		} else {
	    	echo "false";
	}
}

$conexion->close();

?>