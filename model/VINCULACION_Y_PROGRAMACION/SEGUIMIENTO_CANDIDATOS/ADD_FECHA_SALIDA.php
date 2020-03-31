<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");

//error_reporting(0);

$ID_EVALUACION = $_POST['ID_EVALUACION'];
$FECHA_EVALUACION = $_POST['FECHA_EVALUACION']; 
$NOMBRE = $_POST['NOMBRE'];
$CURP = $_POST['CURP'];
$EVAL = $_POST['PRUEBA'];
$FECHA_S = $_POST['FECHA_S'];


//LA NUMERACION QUE SE UTILIZA ACONTINUACION PERTENECE A LA NUMERACION DEL ARCHIVO CONSTANTES.CS DE PRUEBAS
if($EVAL == 2){
	$EVALUACION = "ISE_S";
}
else if($EVAL == 3){
	$EVALUACION = "MED_S";
}

else if($EVAL == 4){
	$EVALUACION = "TOX_S";
}

else if($EVAL == 5){
	$EVALUACION = "PSI_S";
}
else if($EVAL == 6){
	$EVALUACION = "POL_S";
}

			$sql = ("UPDATE seguimiento_candidatos SET $EVALUACION  = '$FECHA_S' WHERE seguimiento_candidatos.ID_EVALUACION = '$ID_EVALUACION' AND seguimiento_candidatos.CURP = '$CURP'");
				$conexion->set_charset("utf8");
				if ($conexion->query($sql) === TRUE ) {
			   	 	echo "true";
			   	 
				} else {
			    	echo "false";
			  }

$conexion->close();

?>