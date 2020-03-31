<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");
error_reporting(0);

///ISE
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$MOTIVO = $_POST['MOTIVO'];


if($ID_EVALUACION == NULL){
	echo "Ingrese una Evaluacion";
}

else{ 
///ISE
$ID_EVALUACION = $_POST['ID_EVALUACION'];



 		     $sql = ("UPDATE evaluacion SET AUTORIZACION = 'NNN', ESTATUS='1',OBSERVACIONES='$MOTIVO' WHERE ID_EVALUACION = '$ID_EVALUACION'");
				$conexion->set_charset("utf8");
				if ($conexion->query($sql) === TRUE) {
			   	 	echo "true";
				} else {
			    	echo "false";
			  }


 		//  echo $rest2;
 		//  echo $rest;
 
 	}

$conexion->close();
?>