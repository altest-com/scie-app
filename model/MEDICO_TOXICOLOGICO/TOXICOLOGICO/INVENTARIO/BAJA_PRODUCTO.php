<?php
header("Content-type: text/html; charset=utf8");
require("../../../conexion.php");
include_once "../ConexionBD.php"; 

$NAME = $_POST['NAME'];

/*"INSERT INTO ASISTENCIA VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$PRUEBA' ,'$FECHA', '$ASISTENCIA')"*/
		
		$conexion->set_charset("utf8");

			$sqlInsert = "DELETE FROM toxicologia_productos WHERE NOMBRE = '$NAME'";
			if ($conexion->query($sqlInsert) === TRUE) {
		   	 	echo "true";
			} 
			else {
		    	echo "false";
			}
			
		
		

$conexion->close();

?>