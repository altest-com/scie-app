<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");
include_once("ConexionBD.php");

$ID_EVALUACION = $_POST['ID_EVALUACION'];
$ESTATUS = $_POST['ESTATUS'];
$EVAL = $_POST['EVAL'];


if($EVAL == 1) {
	$EVAL = "VYP";
}
else if($EVAL == 2){
	$EVAL = "ISE";
}
else if($EVAL == 3){
	$EVAL = "MEDICO";
}
else if($EVAL == 4){
	$EVAL = "TOX";
}
else if($EVAL == 5){
	$EVAL = "PSICO";
}
else if($EVAL == 6){
	 $EVAL = "POLI";
}
else if($EVAL == 7){
	 $EVAL = "INTEG";
}

$sql = "UPDATE integracion SET $EVAL = '$ESTATUS' WHERE ID_EVALUACION = '$ID_EVALUACION'";

	$conexion->set_charset("utf8");

	if ($conexion->query($sql) === TRUE) {
   	 	echo "true";
   	 	if ($EVAL == "INTEG") {
   	 		$cone = conectarBD();
   	 		$lol = Obtener_DERIBADA($cone,$ID_EVALUACION);
   	 		$sql = "UPDATE integracion SET $EVAL = '$ESTATUS' WHERE ID_EVALUACION = '$lol'";
   	 		if ($conexion->query($sql) === TRUE) {
   	 			echo "true";
   	 		}
   	 		else {
		    	echo "false";
			}
			$time = time();
            $fecha = date("Y-m-d", $time);
			$sql = "UPDATE concentrado_integracion SET FECHA_RI = '$fecha' WHERE ID_EVALUACION = '$ID_EVALUACION'";
   	 		if ($conexion->query($sql) === TRUE) {
   	 			echo "true";
   	 		}
   	 		else {
		    	echo "false";
			}
   	 	}
	}
	else {
    	echo "false";
	}
$conexion->close();

?>