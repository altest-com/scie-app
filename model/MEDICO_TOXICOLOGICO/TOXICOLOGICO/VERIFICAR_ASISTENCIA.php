<?php
header("Content-type: text/html; charset=utf8");
require("../../conexion.php"); 
include_once "ConexionBD.php";

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$PRUEBA = $_POST['PRUEBA'];


if ($PRUEBA == 1)//Exaneb toxicologico
{
	$PRUEBA = 'FECHA_EXAMEN_TOXICOLÓGICO';
}
else if ($PRUEBA == 2)//Examen toxicologico.  !QUE MI MARIOOO!!
{
	$PRUEBA = 'FECHA_ISE_DOCUMENTOS';
}
else if ($PRUEBA == 3)//Exaneb toxicologico
{
	$PRUEBA = 'FECHA_ISE_ENTREVISTA';
}
else if ($PRUEBA == 4)//Exaneb toxicologico
{
	$PRUEBA = 'FECHA_EXAMEN_PSICOLÓGICO';
}
else if ($PRUEBA == 5)//Exaneb toxicologico
{
	$PRUEBA = 'FECHA_EXAMEN_MÉDICO';
}
else if ($PRUEBA == 6)//Exaneb toxicologico
{
	$PRUEBA = 'FECHA_EXAMEN_POLIGRÁFICO';
}
/*"INSERT INTO ASISTENCIA VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$PRUEBA' ,'$FECHA', '$ASISTENCIA')"*/
		$cone = conectarBD();
		$lol = Verificar_asistencia($cone,$ID_CANDIDATO, $ID_EVALUACION, "",$PRUEBA);
		$conexion->set_charset("utf8");
		if($lol=="correcto"){
			
			echo "correcto";
		}
		else{
			echo "incorrecto";
		}
		

$conexion->close();

?>