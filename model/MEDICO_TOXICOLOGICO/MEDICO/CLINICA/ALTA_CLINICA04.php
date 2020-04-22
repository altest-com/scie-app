<?php
header("Content-type: text/html; charset=utf8");
require("../../../conexion.php");
include_once "../ConexionBD.php"; 

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$PISO = $_POST['PISO'];
$TECHO = $_POST['TECHO'];
$PAREDES = $_POST['PAREDES'];
$SERVICIOS = $_POST['SERVICIOS'];
$ALIMENTACION = $_POST['ALIMENTACION'];
$ZOONOSIS = $_POST['ZOONOSIS'];
$BANO = $_POST['BANO'];
$LAVADO_DIENTES = $_POST['LAVADO_DIENTES'];
$HOBBIE = $_POST['HOBBIE'];
$DEPORTE = $_POST['DEPORTE'];


/*"INSERT INTO ASISTENCIA VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$PRUEBA' ,'$FECHA', '$ASISTENCIA')"*/
		$cone = conectarBD();
		$lol = Verificar_clinica04($cone,$ID_CANDIDATO, $ID_EVALUACION);
		echo $lol;
		$conexion->set_charset("utf8");

		if($lol=="correcto"){
			
			$sqlUpdate = "UPDATE medico_clinica04 SET PISO = '$PISO', TECHO = '$TECHO', PAREDES = '$PAREDES', SERVICIOS = '$SERVICIOS',ALIMENTACION  = '$ALIMENTACION', ZOONOSIS = '$ZOONOSIS',BANO='$BANO',LAVADO_DIENTES='$LAVADO_DIENTES',HOBBIE='$HOBBIE',DEPORTE='$DEPORTE' WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION = '$ID_EVALUACION'";
			if ($conexion->query($sqlUpdate) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
			
		}

		else{
			$sqlInsert = "INSERT INTO medico_clinica04 VALUES ('$ID_CANDIDATO','$ID_EVALUACION','$PISO','$TECHO','$PAREDES', '$SERVICIOS', '$ALIMENTACION','$ZOONOSIS' ,'$BANO', '$LAVADO_DIENTES', '$HOBBIE', '$DEPORTE')";

			if ($conexion->query($sqlInsert) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
		}
		

$conexion->close();

?>