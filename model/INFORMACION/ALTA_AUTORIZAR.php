<?php
header("Content-type: text/html; charset=utf8");
require("../conexion.php");
include_once "ConexionBD.php";

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$ESTATUS = $_POST['ESTATUS'];

/*"INSERT INTO ASISTENCIA VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$PRUEBA' ,'$FECHA', '$ASISTENCIA')"*/
	$conexion2 = conectarBD();
	$lol = Verificar_status2($conexion2,$ID_CANDIDATO,$ID_EVALUACION);
	if($lol=="incorrecto"){
		$sqlInsert = "INSERT INTO autorizar_informacion VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$ESTATUS')";

		if($conexion->query($sqlInsert) === TRUE) {
		   	echo "true";
		} 
		else{
		    echo "false";
		}
	}
	else{
		if($lol=="1"){
			$lol=="0";
		}
		else{
			$lol=="1";
		}
		$sqlInsert = "UPDATE autorizar_informacion SET ESTATUS = '$lol' WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION = '$ID_EVALUACION'";

		if($conexion->query($sqlInsert) === TRUE) {
		   	echo "true";
		} 
		else{
		    echo "false";
		}
	}
	
		

$conexion->close();

?>