<?php
header("Content-type: text/html; charset=utf8");
require("../../conexion.php");
include_once "ConexionBD.php";

$CURP = $_POST['CURP'];
$TIPO = $_POST['TIPO'];
$PROCESO = $_POST['PROCESO'];
$CORPORACION = $_POST['CORPORACION'];
$DEPENDENCIA = $_POST['DEPENDENCIA'];
$ADSCRIPCION = $_POST['ADSCRIPCION'];
$PUESTO = $_POST['PUESTO'];
$ESTATUS = $_POST['ESTATUS'];
$ID = $_POST['ID'];


/*"INSERT INTO ASISTENCIA VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$PRUEBA' ,'$FECHA', '$ASISTENCIA')"*/
		$conexion->set_charset("utf8");
		$cone = conectarBD();

		if($TIPO == "ALTA"){
			$sqlInsert = "INSERT INTO vinculacion_curps VALUES ('','$CURP', '$PROCESO','$CORPORACION','$DEPENDENCIA','$ADSCRIPCION','$PUESTO','0')";

			if ($conexion->query($sqlInsert) === TRUE) {
		   		echo Consultar_ID($cone);
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
		else if($TIPO == "UPDATE"){
			$sqlUpdate = "UPDATE vinculacion_curps SET PROCESO = '$PROCESO',CORPORACION2 = '$CORPORACION',DEPENDENCIA2 = '$DEPENDENCIA',ADSCRIPCION2 = '$ADSCRIPCION',PUESTO2 = '$PUESTO', ESTATUS='1' WHERE ID = '$ID'";
			if ($conexion->query($sqlUpdate) === TRUE) {
				echo "true";
		 	} 
		 	else{
				echo "false";	
			}
		}
		else
		{
			$sqlUpdate = "UPDATE vinculacion_curps SET PROCESO = '$PROCESO',CORPORACION2 = '$CORPORACION',DEPENDENCIA2 = '$DEPENDENCIA',ADSCRIPCION2 = '$ADSCRIPCION',PUESTO2 = '$PUESTO' WHERE CURP = '$CURP' AND ESTATUS = '0'";
			if ($conexion->query($sqlUpdate) === TRUE) {
				echo "true";
		 	} 
		 	else{
				echo "false";	
			}
		}
		

$conexion->close();

?>