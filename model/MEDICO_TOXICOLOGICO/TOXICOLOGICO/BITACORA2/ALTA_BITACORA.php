<?php
header("Content-type: text/html; charset=utf8");
require("../../../conexion.php");
include_once "../ConexionBD.php"; 

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$COCAINA = $_POST['COCAINA'];
$THC = $_POST['THC'];
$BENZODIAZEPINAS = $_POST['BENZODIAZEPINAS'];
$ANFETAMINAS = $_POST['ANFETAMINAS'];
$METANFETAMINAS = $_POST['METANFETAMINAS'];
$BARBITURICOS = $_POST['BARBITURICOS'];
$OPIOIDES = $_POST['OPIOIDES'];



/*"INSERT INTO ASISTENCIA VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$PRUEBA' ,'$FECHA', '$ASISTENCIA')"*/
		$cone = conectarBD();
		$lol = Verificar_bitacora2($cone,$ID_CANDIDATO, $ID_EVALUACION);
		echo $lol;
		$conexion->set_charset("utf8");

		if($lol=="correcto"){
			$sqlUpdate = "UPDATE toxicologico_bitacora2 SET COCAINA = '$COCAINA', THC = '$THC', BENZODIAZEPINAS = '$BENZODIAZEPINAS', ANFETAMINAS = '$ANFETAMINAS', METANFETAMINAS = '$METANFETAMINAS', BARBITURICOS = '$BARBITURICOS', OPIOIDES = '$OPIOIDES' WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION ='$ID_EVALUACION'";
			if ($conexion->query($sqlUpdate) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
			
		}

		else{
			$sqlInsert = "INSERT INTO toxicologico_bitacora2 VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$COCAINA','$THC' ,'$BENZODIAZEPINAS', '$ANFETAMINAS', '$METANFETAMINAS', '$BARBITURICOS', '$OPIOIDES')";

			if ($conexion->query($sqlInsert) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
		}
		

$conexion->close();

?>