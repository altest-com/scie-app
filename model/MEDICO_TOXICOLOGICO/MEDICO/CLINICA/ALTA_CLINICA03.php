<?php
header("Content-type: text/html; charset=utf8");
require("../../../conexion.php");
include_once "../ConexionBD.php"; 

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$FISICO = $_POST['FISICO'];
$QUIMICO = $_POST['QUIMICO'];
$BIOLOGICO = $_POST['BIOLOGICO'];
$PSICOSOCIAL = $_POST['PSICOSOCIAL'];
$MECANICOS = $_POST['MECANICOS'];
$FISICO_P = $_POST['FISICO_P'];
$QUIMICO_P = $_POST['QUIMICO_P'];
$BIOLOGICO_P = $_POST['BIOLOGICO_P'];
$PSICOSOCIAL_P = $_POST['PSICOSOCIAL_P'];
$MECANICOS_P = $_POST['MECANICOS_P'];
$ACTIVIDADES_LABORALES = $_POST['ACTIVIDADES_LABORALES'];


/*"INSERT INTO ASISTENCIA VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$PRUEBA' ,'$FECHA', '$ASISTENCIA')"*/
		$cone = conectarBD();
		$lol = Verificar_clinica03($cone,$ID_CANDIDATO, $ID_EVALUACION);
		echo $lol;
		$conexion->set_charset("utf8");

		if($lol=="correcto"){
			
			$sqlUpdate = "UPDATE medico_clinica03 SET FISICO = '$FISICO', QUIMICO = '$QUIMICO', BIOLOGICO = '$BIOLOGICO', PSICOSOCIAL = '$PSICOSOCIAL', MECANICOS = '$MECANICOS',FISICO_P  = '$FISICO_P', QUIMICO_P = '$QUIMICO_P',BIOLOGICO_P='$BIOLOGICO_P',PSICOSOCIAL_P='$PSICOSOCIAL_P',MECANICOS_P='$MECANICOS_P',ACTIVIDADES_LABORALES='$ACTIVIDADES_LABORALES' WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION = '$ID_EVALUACION'";
			if ($conexion->query($sqlUpdate) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
			
		}

		else{
			$sqlInsert = "INSERT INTO medico_clinica03 VALUES ('$ID_CANDIDATO','$ID_EVALUACION','$FISICO','$QUIMICO','$BIOLOGICO', '$PSICOSOCIAL', '$MECANICOS', '$FISICO_P','$QUIMICO_P' ,'$BIOLOGICO_P', '$PSICOSOCIAL_P', '$MECANICOS_P', '$ACTIVIDADES_LABORALES')";

			if ($conexion->query($sqlInsert) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
		}
		

$conexion->close();

?>