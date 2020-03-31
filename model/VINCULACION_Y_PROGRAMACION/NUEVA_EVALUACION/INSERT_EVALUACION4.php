<?php
header("Content-type: text/html; charset=utf8");
include ("../../MySqlConnect.php");
include ("../../conection.php"); 
include_once "ConexionBD.php";
//Datos de la evaluación
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$FECHA_EVALUACION = $_POST['FECHA_EVALUACION'];
$TIPO_EVALUACION = $_POST['TIPO_EVALUACION'];
$MOTIVO_EVALUACION = $_POST['MOTIVO_EVALUACION'];
$MODO_EVALUACION = $_POST['MODO_EVALUACION'];
$SOLICITANTE_DE_EVALUACION  = $_POST['SOLICITANTE_DE_EVALUACION'];
$ORIGEN_DE_RECURSOS  = $_POST['ORIGEN_DE_RECURSOS'];
$FECHA_EXAMEN_TOXICOLOGICO  = $_POST['FECHA_EXAMEN_TOXICOLOGICO'];
$FECHA_ISE_DOCUMENTOS  = $_POST['FECHA_ISE_DOCUMENTOS'];
$FECHA_ISE_ENTREVISTA = $_POST['FECHA_ISE_ENTREVISTA'];
$FECHA_EXAMEN_PSICOLOGICO = $_POST['FECHA_EXAMEN_PSICOLOGICO'];
$FECHA_EXAMEN_MEDICO = $_POST['FECHA_EXAMEN_MEDICO'];
$FECHA_EXAMEN_POLIGRAFICO = $_POST['FECHA_EXAMEN_POLIGRAFICO'];
$ESTATUS = $_POST['ESTATUS'];
$EVALUACION_DERIVADA_DE = $_POST['EVALUACION_DERIVADA_DE'];
$ADSCRIPCION = $_POST['ADSCRIPCION'];
$PUESTO = $_POST['PUESTO'];
if (isset($_POST['OBSERVACIONES'])) {
	$OBSERVACIONES = $_POST['OBSERVACIONES'];
}
else{
	$OBSERVACIONES = "";
}

if ($EVALUACION_DERIVADA_DE === NULL)
{
	$EVALUACION_DERIVADA_DE = "---";
}

//Datos del oficio a actualizar
$OFICIO = $_POST['OFICIO'];
$CORPORACION = $_POST['CORPORACION'];
$DEPENDENCIA = $_POST['DEPENDENCIA'];
$ANIO = $_POST['ANIO'];

//Verificando que se hayan enviado todos los datos de la evaluación
if (isset($ID_EVALUACION) && isset($ID_CANDIDATO) && isset($FECHA_EVALUACION) && isset($TIPO_EVALUACION) && isset($MOTIVO_EVALUACION) && isset($MODO_EVALUACION) &&
	isset($SOLICITANTE_DE_EVALUACION) && isset($ORIGEN_DE_RECURSOS) && isset($FECHA_EXAMEN_TOXICOLOGICO) && isset($FECHA_EXAMEN_MEDICO) && isset($FECHA_ISE_ENTREVISTA) &&
	isset($FECHA_ISE_DOCUMENTOS) && isset($FECHA_EXAMEN_POLIGRAFICO) && isset($FECHA_EXAMEN_PSICOLOGICO) && isset($ESTATUS) && isset($EVALUACION_DERIVADA_DE))
	{
		//Verificando que se hayan enviado los datos del oficio a actualizar
		if (isset($OFICIO) && isset($CORPORACION) && isset($ANIO) && isset($DEPENDENCIA))
		{
			$conexion = new MySqlConnect($db, $user, $pswd);
			$cone = conectarBD();
			$lol = Verificar_candidato($cone,$ID_CANDIDATO);
			$AUTORIZACION ="000";

			$queryEvaluacion = sprintf("INSERT INTO EVALUACION (ID_EVALUACION, ID_CANDIDATO, FECHA_EVALUACION, TIPO_EVALUACION, MOTIVO_EVALUACION, MODO_EVALUACION,
				SOLICITANTE_DE_EVALUACION, ORIGEN_DE_RECURSOS, FECHA_EXAMEN_TOXICOLOGICO, FECHA_ISE_DOCUMENTOS, FECHA_ISE_ENTREVISTA, FECHA_EXAMEN_PSICOLOGICO, 
				FECHA_EXAMEN_MEDICO, FECHA_EXAMEN_POLIGRAFICO, ESTATUS, NUMERO_OFICIO, FECHA_OFICIO, EVALUACION_DERIVADA_DE, AUTORIZACION,OBSERVACIONES) 
				VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s','%s');",
				$ID_EVALUACION, $ID_CANDIDATO, $FECHA_EVALUACION, $TIPO_EVALUACION, $MOTIVO_EVALUACION, $MODO_EVALUACION, $SOLICITANTE_DE_EVALUACION, $ORIGEN_DE_RECURSOS,
				$FECHA_EXAMEN_TOXICOLOGICO, $FECHA_ISE_DOCUMENTOS, $FECHA_ISE_ENTREVISTA, $FECHA_EXAMEN_PSICOLOGICO, $FECHA_EXAMEN_MEDICO, $FECHA_EXAMEN_POLIGRAFICO,
				$ESTATUS, "---", "---", $EVALUACION_DERIVADA_DE, $AUTORIZACION,$OBSERVACIONES);

			$NOMBRE = sprintf("SELECT CONCAT (PRIMER_NOMBRE, \" \", SEGUNDO_NOMBRE, \" \", PRIMER_APELLIDO, \" \", SEGUNDO_APELLIDO) AS NOMBRE FROM CANDIDATOS
			WHERE ID_CANDIDATO = '%s'", $ID_CANDIDATO);

			$queryIntegracion = sprintf("INSERT INTO INTEGRACION (ID_CANDIDATO, ID_EVALUACION, FECHA, NOMBRE, VYP, ISE, MEDICO, TOX, PSICO, POLI, INTEG) 
				VALUES ('%s', '%s', '%s', ( %s ), 0, 0, 0, 0, 0, 0, 0);", $ID_CANDIDATO, $ID_EVALUACION, $FECHA_EVALUACION, $NOMBRE);

			$antiguaCorporacionQuery = sprintf("SELECT CORPORACION AS ROW FROM OFICIOS WHERE ID_CANDIDATO = '%s' AND NUM_OFICIO = '%s' AND FECHA = '%s';",
				$ID_CANDIDATO, $OFICIO, $ANIO);

			$corporacionQuery = $conexion->getSingleValueFromQuery($antiguaCorporacionQuery);
			
			$temporal = fecha($cone,$ID_CANDIDATO);
			echo "----------------------------------------------------".$temporal;
			$queryUpdateOficio = sprintf("UPDATE OFICIOS SET ID_EVALUACION = '%s',ADSCRIPCION = '%s',PUESTO = '%s', CORPORACION = '%s', DEPENDENCIA = '%s'  
			WHERE ID_CANDIDATO = '%s' AND FECHA = '%s';", 
				$ID_EVALUACION,$ADSCRIPCION,$PUESTO, $CORPORACION, $DEPENDENCIA, $ID_CANDIDATO,$temporal);

			$finalQuery = trim($queryEvaluacion.$queryUpdateOficio.$queryIntegracion);
			echo $finalQuery;
			if ($conexion->executeInsertQuery($finalQuery, 3))
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
			echo "Solicitud no procesada 0x000010";
		}
	}
	else
	{
		echo "Solicitud no procesada 0x000001";
	}
?>