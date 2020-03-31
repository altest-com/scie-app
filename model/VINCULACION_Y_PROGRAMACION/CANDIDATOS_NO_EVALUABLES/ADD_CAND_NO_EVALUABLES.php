<?php
header("Content-type: text/html; charset=utf8");
include ("../../conection.php"); 
include ("../../MySqlConnect.php"); 

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$CURP = $_POST['CURP'];
$NOMBRE = $_POST['NOMBRE'];
$MOTIVO = $_POST['MOTIVO'];

if (isset($ID_CANDIDATO) && isset($CURP) && isset($NOMBRE) && isset($MOTIVO))
{
	$registrarNoEvaluableQuery = sprintf("INSERT INTO CANDIDATOS_NO_EVALUABLES VALUES ('%s', '%s', '%s','%s');", $ID_CANDIDATO, $CURP, $NOMBRE, $MOTIVO);
	$actualizarEvaluacionQuery = sprintf("UPDATE EVALUACION SET EVALUACION.AUTORIZACION = 'NE' WHERE ID_EVALUACION = '%s';", $ID_EVALUACION);
	$existeRegistroQuery = sprintf("SELECT COUNT(*) AS ROW FROM CANDIDATOS_NO_EVALUABLES WHERE ID_CANDIDATO = '%s'", $ID_CANDIDATO);
	$conexion = new MySqlConnect($db, $user, $pswd);
	if ((int)($conexion->getSingleValueFromQuery($existeRegistroQuery)) > 0)
	{
		//Si mayor a 0, el candidato ya esta registrado como "NO EVALUABLE" y falta actualizar la autorización de su evaluación como 'NE'
		
		if ($conexion->executeInsertQuery($actualizarEvaluacionQuery))
		{
			echo "Autorización actualizada; true";
		}
		else
		{
			echo "Autorización no actualizada; false";
		}
	}
	else
	{
		if ($conexion->executeInsertQuery($registrarNoEvaluableQuery.$actualizarEvaluacionQuery, 2))
		{
			echo "Candidato registrado exitosamente como 'No evaluable' con autorización 'NE'; true";
		}
		else
		{
			echo "Solicitud no procesada. Error: Linea 38 - ADD_CAND_NO_EVALUABLES; false";
		}
	}
	$conexion->closeMySqlConnection();
}
?>