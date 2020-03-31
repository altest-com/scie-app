<?php
header("Content-type: text/html; charset=utf8");
require("../../conexion.php"); 

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$COMENTARIO = $_POST['COMENTARIO'];
$RESULTADO = $_POST['RESULTADO'];



		$sql = ("INSERT INTO resultados_psico VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$COMENTARIO', '$RESULTADO')");
				$conexion->set_charset("utf8");

				if ($conexion->query($sql) === TRUE) {
	   	 			echo "true";
				} else {
	    			echo "false";
	    		}
		
    	

$conexion->close();

?>