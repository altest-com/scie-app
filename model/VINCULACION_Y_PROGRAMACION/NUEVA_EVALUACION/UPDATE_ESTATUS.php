<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");

$ID_EVALUACION = $_POST['ID_EVALUACION'];
$ESTATUS = $_POST['ESTATUS'];


	$sql = "UPDATE evaluacion SET ESTATUS = '$ESTATUS' WHERE ID_EVALUACION = '$ID_EVALUACION' ";

	$conexion->set_charset("utf8");

	if ($conexion->query($sql) === TRUE) {
   	 	$sql = "UPDATE integracion SET INTEG = '$ESTATUS' WHERE ID_EVALUACION = '$ID_EVALUACION' ";

		$conexion->set_charset("utf8");
		if ($conexion->query($sql) === TRUE) {
	   	 	if($ESTATUS == 0){
	   	 		$sql = "DELETE FROM autorizar_informacion WHERE ID_EVALUACION = '$ID_EVALUACION' ";

				$conexion->set_charset("utf8");
				if ($conexion->query($sql) === TRUE) {
			   	 	echo "true";
				} 
				else {
			    	echo "false";
				}
			}
			else{
				echo "true";
			}
		} 
		else {
	    	echo "false";
		}
	} 
	else {
    	echo "false";
	}
$conexion->close();

?>