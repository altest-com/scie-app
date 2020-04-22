<?php
header("Content-type: text/html; charset=utf8");
require("../../../conexion.php");
include_once "../ConexionBD.php"; 

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$ALCOHOLISMO = $_POST['ALCOHOLISMO'];
$EDAD_INICIO_A = $_POST['EDAD_INICIO_A'];
$CONSUMO_S_A = $_POST['CONSUMO_S_A'];
$QUE_CONSUME_A = $_POST['QUE_CONSUME_A'];
$FECHA_A = $_POST['FECHA_A'];
$RIESGO_A = $_POST['RIESGO_A'];
$TABAQUISMO = $_POST['TABAQUISMO'];
$EDAD_INICIO_T = $_POST['EDAD_INICIO_T'];
$CONSUMO_S_T = $_POST['CONSUMO_S_T'];
$QUE_CONSUME_T = $_POST['QUE_CONSUME_T'];
$RIESGO_T = $_POST['RIESGO_T'];
$DROGAS = $_POST['DROGAS'];
$OBSERVACIONES = $_POST['OBSERVACIONES'];


/*"INSERT INTO ASISTENCIA VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$PRUEBA' ,'$FECHA', '$ASISTENCIA')"*/
		$cone = conectarBD();
		$lol = Verificar_clinica05($cone,$ID_CANDIDATO, $ID_EVALUACION);
		echo $lol;
		$conexion->set_charset("utf8");

		if($lol=="correcto"){
			
			$sqlUpdate = "UPDATE medico_clinica05 SET ALCOHOLISMO = '$ALCOHOLISMO', EDAD_INICIO_A = '$EDAD_INICIO_A', CONSUMO_S_A = '$CONSUMO_S_A', QUE_CONSUME_A = '$QUE_CONSUME_A', FECHA_A = '$FECHA_A',RIESGO_A  = '$RIESGO_A', TABAQUISMO = '$TABAQUISMO',EDAD_INICIO_T='$EDAD_INICIO_T',CONSUMO_S_T='$CONSUMO_S_T',QUE_CONSUME_T='$QUE_CONSUME_T',RIESGO_T='$RIESGO_T',DROGAS='$DROGAS',OBSERVACIONES='$OBSERVACIONES' WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION = '$ID_EVALUACION'";
			if ($conexion->query($sqlUpdate) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
			
		}

		else{
			$sqlInsert = "INSERT INTO medico_clinica05 VALUES ('$ID_CANDIDATO','$ID_EVALUACION','$ALCOHOLISMO','$EDAD_INICIO_A','$CONSUMO_S_A','$QUE_CONSUME_A','$FECHA_A','$RIESGO_A', '$TABAQUISMO', '$EDAD_INICIO_T','$CONSUMO_S_T' ,'$QUE_CONSUME_T', '$RIESGO_T', '$DROGAS', '$OBSERVACIONES')";

			if ($conexion->query($sqlInsert) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
		}
		

$conexion->close();

?>