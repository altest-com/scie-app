<?php
header("Content-type: text/html; charset=utf8");
require("../../../conexion.php");
include_once "../ConexionBD.php"; 

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$TIPO_CRANEO = $_POST['TIPO_CRANEO'];
$ENDOSTOSIS = $_POST['ENDOSTOSIS'];
$EXOSTOSIS = $_POST['EXOSTOSIS'];
$IMPLANTACION = $_POST['IMPLANTACION'];
$TONO_CRANEO = $_POST['TONO_CRANEO'];
$GANGLIOS = $_POST['GANGLIOS'];
$TIPO_CABELLO = $_POST['TIPO_CABELLO'];
$TIPO_CARA = $_POST['TIPO_CARA'];
$PERFIL = $_POST['PERFIL'];
$SIMETRIA = $_POST['SIMETRIA'];
$OBSERVACIONES_C = $_POST['OBSERVACIONES_C'];
$TIPO_FRENTE = $_POST['TIPO_FRENTE'];
$TONO_MUSCULAR = $_POST['TONO_MUSCULAR'];
$DOLOR_SF = $_POST['DOLOR_SF'];
$TRANSLUMINACION = $_POST['TRANSLUMINACION'];
$OBSERVACIONES_F = $_POST['OBSERVACIONES_F'];


/*"INSERT INTO ASISTENCIA VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$PRUEBA' ,'$FECHA', '$ASISTENCIA')"*/
		$cone = conectarBD();
		$lol = Verificar_clinica09($cone,$ID_CANDIDATO, $ID_EVALUACION);
		echo $lol;
		$conexion->set_charset("utf8");

		if($lol=="correcto"){
			$sqlUpdate = "UPDATE medico_clinica09 SET TIPO_CRANEO = '$TIPO_CRANEO', ENDOSTOSIS = '$ENDOSTOSIS', EXOSTOSIS = '$EXOSTOSIS', IMPLANTACION = '$IMPLANTACION', TONO_CRANEO = '$TONO_CRANEO', GANGLIOS = '$GANGLIOS',TIPO_CABELLO='$TIPO_CABELLO',TIPO_CARA='$TIPO_CARA',PERFIL='$PERFIL',SIMETRIA='$SIMETRIA',OBSERVACIONES_C='$OBSERVACIONES_C',TIPO_FRENTE='$TIPO_FRENTE',TONO_MUSCULAR='$TONO_MUSCULAR',DOLOR_SF='$DOLOR_SF',TRANSLUMINACION='$TRANSLUMINACION',OBSERVACIONES_F='$OBSERVACIONES_F' WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION ='$ID_EVALUACION'";
			if ($conexion->query($sqlUpdate) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
			
		}

		else{
			$sqlInsert = "INSERT INTO medico_clinica09 VALUES ('$ID_CANDIDATO','$ID_EVALUACION','$TIPO_CRANEO','$ENDOSTOSIS','$EXOSTOSIS', '$IMPLANTACION', '$TONO_CRANEO','$GANGLIOS' ,'$TIPO_CABELLO', '$TIPO_CARA', '$PERFIL', '$SIMETRIA', '$OBSERVACIONES_C', '$TIPO_FRENTE', '$TONO_MUSCULAR', '$DOLOR_SF', '$TRANSLUMINACION', '$OBSERVACIONES_F')";

			if ($conexion->query($sqlInsert) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
		}
		

$conexion->close();

?>