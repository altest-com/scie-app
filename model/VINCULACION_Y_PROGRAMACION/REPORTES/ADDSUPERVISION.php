<?php
header("Content-type: text/html; charset=utf8");
require("../../conexion.php"); 
include_once "ConexionBD.php";

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$OBSERVACIONES = $_POST['OBSERVACIONES'];
$SINTESIS = $_POST['SINTESIS'];
$DEPARTAMENTO_ORIGEN = $_POST['DEPARTAMENTO'];

if($DEPARTAMENTO_ORIGEN == 1) {
	$DEPARTAMENTO_ORIGEN = "POLIGRAFÍA";
}
else if($DEPARTAMENTO_ORIGEN == 2){
	$DEPARTAMENTO_ORIGEN = "PSICOLOGÍA";
}
else if($DEPARTAMENTO_ORIGEN == 3){
	$DEPARTAMENTO_ORIGEN = "INVESTIGACIÓN SOCIOECONOMICO";
}
else if($DEPARTAMENTO_ORIGEN == 4){
	$DEPARTAMENTO_ORIGEN = "MÉDICO";
}
else if($DEPARTAMENTO_ORIGEN == 5){
	$DEPARTAMENTO_ORIGEN = "TOXICOLÓGICO";
}
else if($DEPARTAMENTO_ORIGEN == 6){
	$DEPARTAMENTO_ORIGEN = "INTEGRACIÓN";
}

		$cone = conectarBD();
		$lol = Verificar_supervision($cone,$ID_CANDIDATO, $ID_EVALUACION,$DEPARTAMENTO_ORIGEN);

		if($lol == "incorrecto"){
			$sql = ("INSERT INTO supervision_reporte VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$DEPARTAMENTO_ORIGEN' ,'$SINTESIS', '$OBSERVACIONES')");
			$conexion->set_charset("utf8");

			if ($conexion->query($sql) === TRUE) {
   	 			echo "true";
			} else {
    			echo "false";
    		}
    	}
    	else{
    		$sql = ("UPDATE supervision_reporte SET SINTESIS = '$SINTESIS', OBSERVACIONES = '$OBSERVACIONES' WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION ='$ID_EVALUACION' AND DEPARTAMENTO = '$DEPARTAMENTO_ORIGEN'");
			$conexion->set_charset("utf8");

			if ($conexion->query($sql) === TRUE) {
   	 			echo "true";
			} else {
    			echo "false";
    		}
    	}

$conexion->close();

?>