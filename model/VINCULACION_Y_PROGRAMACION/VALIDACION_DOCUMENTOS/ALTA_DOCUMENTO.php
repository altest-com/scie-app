<?php
header("Content-type: text/html; charset=utf8");
require("../../conexion.php");


$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$CURP = $_POST['CURP'];


/*"INSERT INTO ASISTENCIA VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$PRUEBA' ,'$FECHA', '$ASISTENCIA')"*/
		
		$conexion->set_charset("utf8");

		
			$sqlInsert = "INSERT INTO validacion_documentos VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$CURP', '','' ,'', '', '', '','' ,'', '', '', '','' ,'', '', '')";

			if ($conexion->query($sqlInsert) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
		
		

$conexion->close();

?>