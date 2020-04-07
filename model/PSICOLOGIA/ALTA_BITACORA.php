<?php

require("../conexion.php");
include_once "ConexionBD.php"; 

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$ENTREVISTA = $_POST['ENTREVISTA'];
$RESULTADO_AREA = $_POST['RESULTADO_AREA'];
$CRITERIO1 = $_POST['CRITERIO1'];
$CRITERIO2 = $_POST['CRITERIO2'];
$CRITERIO3 = $_POST['CRITERIO3'];
$CRITERIO4 = $_POST['CRITERIO4'];
$CRITERIO5 = $_POST['CRITERIO5'];
$CRITERIO6 = $_POST['CRITERIO6'];
$CRITERIO7 = $_POST['CRITERIO7'];
$NUMERO_OFICIO = $_POST['NUMERO_OFICIO'];
$APODO = $_POST['APODO'];
$OBSERVACIONES = $_POST['OBSERVACIONES'];
$EVALUADOR = $_POST['EVALUADOR'];


/*"INSERT INTO ASISTENCIA VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$PRUEBA' ,'$FECHA', '$ASISTENCIA')"*/
		$cone = conectarBD();
		$lol = Verificar_cali($cone,$ID_CANDIDATO, $ID_EVALUACION);
		echo $lol;
		$conexion->set_charset("utf8");

		if($lol=="correcto"){
			$sqlUpdate = "UPDATE calificacion_psicologico SET ENTREVISTA = '$ENTREVISTA', RESULTADO_AREA = '$RESULTADO_AREA', CRITERIO1 = '$CRITERIO1', CRITERIO2 = '$CRITERIO2', CRITERIO3 = '$CRITERIO3', CRITERIO4 = '$CRITERIO4', CRITERIO5 = '$CRITERIO5', CRITERIO6 = '$CRITERIO6', CRITERIO7 = '$CRITERIO7', NUMERO_OFICIO = '$NUMERO_OFICIO', APODO = '$APODO', OBSERVACIONES = '$OBSERVACIONES', EVALUADOR = '$EVALUADOR' WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION ='$ID_EVALUACION'";
			if ($conexion->query($sqlUpdate) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
			
		}

		else{
			$sqlInsert = "INSERT INTO calificacion_psicologico VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$ENTREVISTA','$RESULTADO_AREA' ,'$CRITERIO1', '$CRITERIO2', '$CRITERIO3', '$CRITERIO4', '$CRITERIO5', '$CRITERIO6', '$CRITERIO7', '$NUMERO_OFICIO', '$APODO', '$OBSERVACIONES','$EVALUADOR')";

			if ($conexion->query($sqlInsert) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
		}
		

$conexion->close();

?>