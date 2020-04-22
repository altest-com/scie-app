<?php
header("Content-type: text/html; charset=utf8");
require("../../../conexion.php");
include_once "../ConexionBD.php"; 

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$CANTIDAD1 = $_POST['CANTIDAD1'];
$HORA1 = $_POST['HORA1'];
$CANTIDAD2 = $_POST['CANTIDAD2'];
$HORA2 = $_POST['HORA2'];
$CANTIDAD3 = $_POST['CANTIDAD3'];
$HORA3 = $_POST['HORA3'];
$HORA_RECO = $_POST['HORA_RECO'];



/*"INSERT INTO ASISTENCIA VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$PRUEBA' ,'$FECHA', '$ASISTENCIA')"*/
		$cone = conectarBD();
		$lol = Verificar_bitacora3($cone,$ID_CANDIDATO, $ID_EVALUACION);
		echo $lol;
		$conexion->set_charset("utf8");

		if($lol=="correcto"){
			$sqlUpdate = "UPDATE toxicologico_bitacora3 SET CANTIDAD1 = '$CANTIDAD1', HORA1 = '$HORA1', CANTIDAD2 = '$CANTIDAD2', HORA2 = '$HORA2', CANTIDAD3 = '$CANTIDAD3', HORA3 = '$HORA3', HORA_RECO = '$HORA_RECO'";
			if ($conexion->query($sqlUpdate) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
			
		}

		else{
			$sqlInsert = "INSERT INTO toxicologico_bitacora3 VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$CANTIDAD1','$HORA1' ,'$CANTIDAD2', '$HORA2', '$CANTIDAD3', '$HORA3', '$HORA_RECO')";

			if ($conexion->query($sqlInsert) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
		}
		

$conexion->close();

?>