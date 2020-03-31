<?php
header("Content-Type: text/html;charset=utf-8");
include ("../../conection.php");
include ("../../mySqlConnect.php");

$ID_EVALUACION = $_POST['ID_EVALUACION'];
$FECHA_TOXICOLOGICO = $_POST['FECHA_TOXICOLOGICO'];
$FECHA_ISEDOCUMENTOS = $_POST['FECHA_ISEDOCUMENTOS'];
$FECHA_ISEENTREVISTA = $_POST['FECHA_ISEENTREVISTA'];
$FECHA_PSICOLOGICO = $_POST['FECHA_PSICOLOGICO'];
$FECHA_MEDICO = $_POST['FECHA_MEDICO'];
$FECHA_POLIGRAFICO = $_POST['FECHA_POLIGRAFICO'];
$MOTIVO = $_POST['MOTIVO_EVALUACION'];
$ESQUEMA = $_POST['ESQUEMA_EVALUACION'];
$ORIGEN = $_POST['ORIGEN_RECURSOS'];

$conexion = new MySqlConnect($db, $user, $pswd);
$origenDeError = "";

if (isset($MOTIVO) && isset($ORIGEN) && isset($ESQUEMA))
{
	$lugaresTotalesTox = (int)$conexion->getValueFromQuery("SELECT TOX FROM LUGARES_DISPONIBLES;", "TOX");
	$lugaresTotalesPsi = (int)$conexion->getValueFromQuery("SELECT PSI FROM LUGARES_DISPONIBLES;", "PSI");
	$lugaresTotalesIse = (int)$conexion->getValueFromQuery("SELECT ISE FROM LUGARES_DISPONIBLES;", "ISE");
	$lugaresTotalesMed = (int)$conexion->getValueFromQuery("SELECT MED FROM LUGARES_DISPONIBLES;", "MED");
	$lugaresTotalesPol = (int)$conexion->getValueFromQuery("SELECT POL FROM LUGARES_DISPONIBLES;", "POL");

	$queryTox = sprintf("SELECT DISTINCT COUNT(EVALUACION.ID_CANDIDATO) AS ROW FROM EVALUACION
		WHERE DATE('%s') IN (DATE(FECHA_EXAMEN_TOXICOLOGICO));", $FECHA_TOXICOLOGICO);
	$queryIDoc = sprintf("SELECT DISTINCT COUNT(EVALUACION.ID_CANDIDATO) AS ROW FROM EVALUACION
		WHERE DATE('%s') IN (DATE(FECHA_ISE_DOCUMENTOS));", $FECHA_ISEDOCUMENTOS);
	$queryIEnt = sprintf("SELECT DISTINCT COUNT(EVALUACION.ID_CANDIDATO) AS ROW FROM EVALUACION
		WHERE DATE('%s') IN (DATE(FECHA_ISE_ENTREVISTA));", $FECHA_ISEENTREVISTA);
	$queryMed = sprintf("SELECT DISTINCT COUNT(EVALUACION.ID_CANDIDATO) AS ROW FROM EVALUACION
		WHERE DATE('%s') IN (DATE(FECHA_EXAMEN_MEDICO));", $FECHA_MEDICO);
	$queryPol = sprintf("SELECT DISTINCT COUNT(EVALUACION.ID_CANDIDATO) AS ROW FROM EVALUACION
		WHERE DATE('%s') IN (DATE(FECHA_EXAMEN_POLIGRAFICO));", $FECHA_POLIGRAFICO);
	$queryPsi = sprintf("SELECT DISTINCT COUNT(EVALUACION.ID_CANDIDATO) AS ROW FROM EVALUACION
		WHERE DATE('%s') IN (DATE(FECHA_EXAMEN_PSICOLOGICO));", $FECHA_PSICOLOGICO);

	//Primero verificar si aún hay lugares
	$lugaresOcupadosTox = (int)$conexion->getSingleValueFromQuery($queryTox);
	$lugaresOcupadosPsi = (int)$conexion->getSingleValueFromQuery($queryPsi);
	$lugaresOcupadosIDoc = (int)$conexion->getSingleValueFromQuery($queryIDoc);
	$lugaresOcupadosIEnt = (int)$conexion->getSingleValueFromQuery($queryIEnt);
	$lugaresOcupadosMed = (int)$conexion->getSingleValueFromQuery($queryMed);
	$lugaresOcupadosPol = (int)$conexion->getSingleValueFromQuery($queryPol);

	/*
	echo $lugaresOcupadosTox;
	echo $lugaresOcupadosPsi;
	echo $lugaresOcupadosIDoc;
	echo $lugaresOcupadosIEnt;
	echo $lugaresOcupadosMed;
	echo $lugaresOcupadosPol;
	*/
	
	if ($lugaresOcupadosTox < $lugaresTotalesTox)
	{
		// Hay lugares
		$queryUpdateTox = sprintf("UPDATE EVALUACION SET FECHA_EXAMEN_TOXICOLOGICO = '%s', AUTORIZACION = 'FF', MOTIVO_EVALUACION = '%s', MODO_EVALUACION = '%s', ORIGEN_DE_RECURSOS = '%s' WHERE ID_EVALUACION = '%s';",
		$FECHA_TOXICOLOGICO, $MOTIVO, $ESQUEMA, $ORIGEN, $ID_EVALUACION);
		if ($lugaresOcupadosPsi < $lugaresTotalesPsi)
		{
			$queryUpdatePsi = sprintf("UPDATE EVALUACION SET FECHA_EXAMEN_PSICOLOGICO = '%s', AUTORIZACION = 'FF', MOTIVO_EVALUACION = '%s', MODO_EVALUACION = '%s', ORIGEN_DE_RECURSOS = '%s' WHERE ID_EVALUACION = '%s';",
			$FECHA_PSICOLOGICO, $MOTIVO, $ESQUEMA, $ORIGEN, $ID_EVALUACION);
			if ($lugaresOcupadosIDoc < $lugaresTotalesIse)
			{
				$queryUpdateIDoc = sprintf("UPDATE EVALUACION SET FECHA_ISE_DOCUMENTOS = '%s', AUTORIZACION = 'FF', MOTIVO_EVALUACION = '%s', MODO_EVALUACION = '%s', ORIGEN_DE_RECURSOS = '%s' WHERE ID_EVALUACION = '%s';",
				$FECHA_ISEDOCUMENTOS, $MOTIVO, $ESQUEMA, $ORIGEN, $ID_EVALUACION);
				if ($lugaresOcupadosIEnt < $lugaresTotalesIse)
				{
					$queryUpdateIEnt = sprintf("UPDATE EVALUACION SET FECHA_ISE_ENTREVISTA = '%s', AUTORIZACION = 'FF', MOTIVO_EVALUACION = '%s', MODO_EVALUACION = '%s', ORIGEN_DE_RECURSOS = '%s' WHERE ID_EVALUACION = '%s';",
					$FECHA_ISEENTREVISTA, $MOTIVO, $ESQUEMA, $ORIGEN, $ID_EVALUACION);
					if ($lugaresOcupadosMed < $lugaresTotalesMed)
					{
						$queryUpdateMed = sprintf("UPDATE EVALUACION SET FECHA_EXAMEN_MEDICO = '%s', AUTORIZACION = 'FF', MOTIVO_EVALUACION = '%s', MODO_EVALUACION = '%s', ORIGEN_DE_RECURSOS = '%s' WHERE ID_EVALUACION = '%s';",
						$FECHA_MEDICO, $MOTIVO, $ESQUEMA, $ORIGEN, $ID_EVALUACION);
						if ($lugaresOcupadosPol < $lugaresTotalesPol)
						{
							$queryUpdatePol = sprintf("UPDATE EVALUACION SET FECHA_EXAMEN_POLIGRAFICO = '%s', AUTORIZACION = 'FF', MOTIVO_EVALUACION = '%s', MODO_EVALUACION = '%s', ORIGEN_DE_RECURSOS = '%s' WHERE ID_EVALUACION = '%s';",
							$FECHA_POLIGRAFICO, $MOTIVO, $ESQUEMA, $ORIGEN, $ID_EVALUACION);

							$conexion->executeInsertQuery($queryUpdateTox.$queryUpdatePsi.$queryUpdateIDoc.$queryUpdateIEnt.$queryUpdateMed.$queryUpdatePol, 6);
						}
						else
						{
							$origenDeError = ".Poligrafía.".$lugaresTotalesPol;
						}
					}
					else
					{
						$origenDeError = ".Médico.".$lugaresTotalesMed;
					}
				}
				else
				{
					$origenDeError = ".ISE Entrevista.".$lugaresTotalesIse;
				}
			}
			else
			{
				$origenDeError = ".ISE Documentos.".$lugaresTotalesIse;
			}
		}
		else
		{
			$origenDeError = ".Psicología.".$lugaresTotalesPsi;
		}
	}
	else
	{
		//No hay lugares;
		$origenDeError = ".Toxicología.".$lugaresTotalesTox;
	}
	echo $origenDeError;
}
$conexion->closeMySqlConnection();

?>