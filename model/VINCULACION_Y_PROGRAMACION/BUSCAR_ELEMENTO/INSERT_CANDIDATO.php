<?php
header("Content-type: text/html; charset=utf8");
include ("MySqlConnect.php");
include ("../../conection.php"); 
$conexion = new MySqlConnect($db, $user, $pswd);
error_reporting(0);
//Para oficio, los datos de oficio son generales (los mismos) para todos.
$OFICIO = (int)$_POST['OFICIO'];
$DEPENDENCIA = $_POST['DEPENDENCIA'];
$CORPORACION = $_POST['CORPORACION'];
$ADSCRIPCION = $_POST['ADSCRIPCION'];
$PUESTO = $_POST['PUESTO'];
$ANIO = (int)$_POST['ANIO'];
//Para el candidato, estos datos son los del candidato.
$CURP = $_POST['CURP'];
$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$PRIMER_NOMBRE = $_POST['PRIMER_NOMBRE'];
$SEGUNDO_NOMBRE = $_POST['SEGUNDO_NOMBRE'];
$PRIMER_APELLIDO = $_POST['PRIMER_APELLIDO'];
$SEGUNDO_APELLIDO = $_POST['SEGUNDO_APELLIDO'];

//Verificando si todos los datos para el oficio fueron enviados
if(isset($OFICIO) && isset($CORPORACION) && isset($DEPENDENCIA) && isset($ANIO) && isset($ADSCRIPCION) && isset($PUESTO))
{
 	//Verificando si todos los datos del candidato fueron enviados
 	if (isset($CURP) && isset($ID_CANDIDATO) && isset($PRIMER_NOMBRE) && isset($SEGUNDO_NOMBRE)	&& isset($PRIMER_APELLIDO) && isset($SEGUNDO_APELLIDO))
 	{
 		//Todo correcto hasta este punto
 		//Insertar candidato y oficio usando el método executeInsertQuery
 		$query = sprintf("INSERT INTO CANDIDATOS (ID_CANDIDATO, PRIMER_NOMBRE, SEGUNDO_NOMBRE, PRIMER_APELLIDO, SEGUNDO_APELLIDO, CURP)
 			VALUES (%s, %s, %s, %s, %s, %s);\n", $ID_CANDIDATO, $PRIMER_NOMBRE, $SEGUNDO_NOMBRE, $PRIMER_APELLIDO, $SEGUNDO_APELLIDO, $CURP);
 		$query .= sprintf("INSERT INTO OFICIOS (NUM_OFICIO, ID_CANDIDATO, ID_EVALUACION, DEPENDENCIA, ADSCRIPCION, CORPORACION, PUESTO, ANIO)
 			VALUES (%d, %s, NULL, %s, %s, %s, %s, %d);", $OFICIO, $ID_CANDIDATO, $ID_EVALUACION, $DEPENDENCIA, $ADSCRIPCION, $CORPORACION, $PUESTO, $ANIO);
 		if ($conexion->executeInsertQuery($query, TRUE))
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
 		echo "Solicitud no procesada 0x000010 false";
  	}
}
else
{
	echo "Solicitud no procesada 0x00001 false";
}
$conexion->closeMySqlConnection();
?>