<?php
header("Content-type: text/html; charset=utf8");
require("../../../conexion.php");
include_once "../ConexionBD.php"; 

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$HORAS_SUENO = $_POST['HORAS_SUENO'];
$PERFORACIONES = $_POST['PERFORACIONES'];
$INMUNIZACIONES = $_POST['INMUNIZACIONES'];
$ALERGIAS = $_POST['ALERGIAS'];
$CIRUGIAS = $_POST['CIRUGIAS'];
$LESIONES = $_POST['LESIONES'];
$HOSPITALIZACION = $_POST['HOSPITALIZACION'];
$TRANSFUCIONES = $_POST['TRANSFUCIONES'];



/*"INSERT INTO ASISTENCIA VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$PRUEBA' ,'$FECHA', '$ASISTENCIA')"*/
		$cone = conectarBD();
		$lol = Verificar_clinica06($cone,$ID_CANDIDATO, $ID_EVALUACION);
		echo $lol;
		$conexion->set_charset("utf8");

		if($lol=="correcto"){
			
			$sqlUpdate = "UPDATE medico_clinica06 SET HORAS_SUENO = '$HORAS_SUENO', PERFORACIONES = '$PERFORACIONES', INMUNIZACIONES = '$INMUNIZACIONES', ALERGIAS = '$ALERGIAS',CIRUGIAS  = '$CIRUGIAS', LESIONES = '$LESIONES',HOSPITALIZACION='$HOSPITALIZACION',TRANSFUCIONES='$TRANSFUCIONES' WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION = '$ID_EVALUACION'";
			if ($conexion->query($sqlUpdate) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
			
		}

		else{
			$sqlInsert = "INSERT INTO medico_clinica06 VALUES ('$ID_CANDIDATO','$ID_EVALUACION','$HORAS_SUENO','$PERFORACIONES','$INMUNIZACIONES','$ALERGIAS','$CIRUGIAS', '$LESIONES', '$HOSPITALIZACION','$TRANSFUCIONES' )";

			if ($conexion->query($sqlInsert) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
		}
		

$conexion->close();

?>