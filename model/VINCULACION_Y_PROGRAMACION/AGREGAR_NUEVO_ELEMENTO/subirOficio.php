<?php
header("Content-type: text/html; charset=utf8");
include ("../../MySqlConnect.php");
include ("../../conection.php"); 
$conexion = new MySqlConnect($db, $user, $pswd);
error_reporting(0);

//Para el candidato, estos datos son los del candidato.
$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$NUM_OFICIO = $_POST['NUM_OFICIO'];
$DEPENDENCIA = $_POST['DEPENDENCIA'];
$CORPORACION = $_POST['CORPORACION'];
$ADSCRIPCION = $_POST['ADSCRIPCION'];
$PUESTO = $_POST['PUESTO'];
$ANIO = (int)$_POST['ANIO'];

if(isset($NUM_OFICIO) && isset($CORPORACION) && isset($DEPENDENCIA) && isset($ANIO) && isset($ADSCRIPCION) && isset($PUESTO) && isset($ID_CANDIDATO))
{
 	//Verificando si todos los datos del oficio fueron enviados
 	$query .= sprintf("INSERT INTO OFICIOS (NUM_OFICIO, ID_CANDIDATO, ID_EVALUACION, DEPENDENCIA, ADSCRIPCION, CORPORACION, PUESTO, ANIO)
 	VALUES ('%d', '%s', NULL, '%s', '%s', '%s', '%s', '%d');", $NUM_OFICIO, $ID_CANDIDATO, $DEPENDENCIA, $ADSCRIPCION, $CORPORACION, $PUESTO, (int)$ANIO);
 	//echo $query;
 	if ($conexion->executeInsertQuery($query, 1))
 	{
 		echo "true";
 	}
 	else
 	{
 		echo "false";
 	}
}
else
{
	echo "Solicitud no procesada 0x00001 false";
}
?>