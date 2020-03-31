<?php
header("Content-type: text/html; charset=utf8");
require("../../conexion.php");
include_once "ConexionBD.php";


$ID = $_POST['ID'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];


/*"INSERT INTO ASISTENCIA VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$PRUEBA' ,'$FECHA', '$ASISTENCIA')"*/
		$conexion->set_charset("utf8");
		$cone = conectarBD();
		$sqlInsert = "UPDATE vinculacion_curps SET ID_EVALUACION = '$ID_EVALUACION' WHERE ID = '$ID'";

			if ($conexion->query($sqlInsert) === TRUE) {
		   		echo Consultar_ID($cone);
			} 
			else{
				echo "false";
			}
		
		

$conexion->close();

?>