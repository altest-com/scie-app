<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");

$ID_EVALUACION = $_POST['ID_EVALUACION'];
$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_OFICIO = $_POST['NUMERO_OFICIO'];


if ($ID_EVALUACION === NULL){
	echo "false";
}
else{  

			$sql1 = ("UPDATE oficios SET ID_EVALUACION = '$ID_EVALUACION' WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_OFICIO = '$ID_OFICIO' ");
				$conexion->set_charset("utf8");
				if ($conexion->query($sql1) === TRUE) {
			   	 	echo "true";
				} else {
			    	echo "false update";
			  }
}		



$conexion->close();

?>