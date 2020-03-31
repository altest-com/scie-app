<?php
header("Content-type: text/html; charset=utf8");
require("../conexion.php");
include_once "ConexionBD.php";

$FECHA = $_POST['FECHA'];
$NOMBRE = $_POST['NOMBRE'];
$CURP = $_POST['CURP'];
$CLAVE = $_POST['CLAVE'];

/*"INSERT INTO ASISTENCIA VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$PRUEBA' ,'$FECHA', '$ASISTENCIA')"*/
		$sqlInsert = "INSERT INTO ise_claves_local VALUES ('$FECHA', '$NOMBRE', '$CURP','$CLAVE')";

			if ($conexion->query($sqlInsert) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
		

$conexion->close();

?>