<?php
header("Content-type: text/html; charset=utf8");
require("../conexion.php");
include_once "ConexionBD.php";

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];


/*"INSERT INTO ASISTENCIA VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$PRUEBA' ,'$FECHA', '$ASISTENCIA')"*/
	$conexion2 = conectarBD();
	$lol = Verificar_status2($conexion2,$ID_CANDIDATO,$ID_EVALUACION);
	echo $lol;
	
		

$conexion->close();

?>