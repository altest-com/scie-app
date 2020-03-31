<?php
header("Content-type: text/html; charset=utf8");
require("../../conexion.php");
include_once "ConexionBD.php";

$CURP = $_POST['CURP'];
$TIPO = $_POST['TIPO'];
$PROCESO = $_POST['PROCESO'];
$ID = $_POST['ID'];
$ORIGEN = $_POST['ORIGEN'];


/*"INSERT INTO ASISTENCIA VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$PRUEBA' ,'$FECHA', '$ASISTENCIA')"*/
		$conexion->set_charset("utf8");

		if($TIPO == "ALTA"){
			$sqlInsert = "INSERT INTO vinculacion_curps_ext VALUES ('','$CURP', '$PROCESO','0','$ORIGEN')";

			if ($conexion->query($sqlInsert) === TRUE) {
		   		echo "true";
			} 
			else{
				echo "false";
			}
		}
		else if($TIPO == "BAJA"){
			$sqlInsert = "DELETE FROM vinculacion_curps WHERE ID = '$ID'";

			if ($conexion->query($sqlInsert) === TRUE) {
		   		echo "true";
			} 
			else{
				echo "false";
			}
		}
		else
		{
			$sqlUpdate = "UPDATE vinculacion_curps_ext SET PROCESO = '$PROCESO', ORIGEN = '$ORIGEN'  WHERE ID = '$ID'";
			if ($conexion->query($sqlUpdate) === TRUE) {
				echo "true";
		 	} 
		 	else{
				echo "false";
			}
		}
		

$conexion->close();

?>