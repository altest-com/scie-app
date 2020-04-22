<?php
header("Content-type: text/html; charset=utf8");
require("../../../conexion.php");
include_once "../ConexionBD.php"; 

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$LENTES = $_POST['LENTES'];
$CUANDO_LENTES = $_POST['CUANDO_LENTES'];
$REGULAR_LENTES = $_POST['REGULAR_LENTES'];
$CHEQUEO = $_POST['CHEQUEO'];
$GRADUACION = $_POST['GRADUACION'];
$VISTA = $_POST['VISTA'];
$OD1 = $_POST['OD1'];
$OI1 = $_POST['OI1'];
$OD2 = $_POST['OD2'];
$OI2 = $_POST['OI2'];
$OD3 = $_POST['OD3'];
$OI3 = $_POST['OI3'];
$REFLEJOS = $_POST['REFLEJOS'];
$OBSERVACIONES_V = $_POST['OBSERVACIONES_V'];
$NARIZ = $_POST['NARIZ'];
$TABIQUE = $_POST['TABIQUE'];
$TIPO_NARIZ = $_POST['TIPO_NARIZ'];
$MUCOSAS = $_POST['MUCOSAS'];
$SECRESION = $_POST['SECRESION'];
$OBSERVACIONES_N = $_POST['OBSERVACIONES_N'];
$PTER_EXTERNO = $_POST['PTER_EXTERNO'];
$PTER_INTERNO = $_POST['PTER_INTERNO'];
$ISHIHARA = $_POST['ISHIHARA'];


/*"INSERT INTO ASISTENCIA VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$PRUEBA' ,'$FECHA', '$ASISTENCIA')"*/
		$cone = conectarBD();
		$lol = Verificar_clinica10($cone,$ID_CANDIDATO, $ID_EVALUACION);
		echo $lol;
		$conexion->set_charset("utf8");

		if($lol=="correcto"){
			$sqlUpdate = "UPDATE medico_clinica10 SET LENTES = '$LENTES', CUANDO_LENTES = '$CUANDO_LENTES', REGULAR_LENTES = '$REGULAR_LENTES', CHEQUEO = '$CHEQUEO', GRADUACION = '$GRADUACION', VISTA = '$VISTA',OD1='$OD1',OI1='$OI1',OD2='$OD2',OI2='$OI2',OD3='$OD3',OI3='$OI3',REFLEJOS='$REFLEJOS',OBSERVACIONES_V='$OBSERVACIONES_V',NARIZ='$NARIZ',TABIQUE='$TABIQUE',TIPO_NARIZ='$TIPO_NARIZ',MUCOSAS='$MUCOSAS',SECRESION='$SECRESION',OBSERVACIONES_N='$OBSERVACIONES_N',PTER_EXTERNO='$PTER_EXTERNO',PTER_INTERNO='$PTER_INTERNO',ISHIHARA='$ISHIHARA' WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION ='$ID_EVALUACION'";
			if ($conexion->query($sqlUpdate) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
			
		}

		else{
			$sqlInsert = "INSERT INTO medico_clinica10 VALUES ('$ID_CANDIDATO','$ID_EVALUACION','$LENTES', '$CUANDO_LENTES', '$REGULAR_LENTES','$CHEQUEO' ,'$GRADUACION', '$VISTA', '$OD1', '$OI1', '$OD2', '$OI2', '$OD3', '$OI3', '$REFLEJOS', '$OBSERVACIONES_V', '$NARIZ', '$TABIQUE', '$TIPO_NARIZ', '$MUCOSAS', '$SECRESION', '$OBSERVACIONES_N', '$PTER_EXTERNO', '$PTER_INTERNO', '$ISHIHARA')";

			if ($conexion->query($sqlInsert) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
		}
		

$conexion->close();

?>