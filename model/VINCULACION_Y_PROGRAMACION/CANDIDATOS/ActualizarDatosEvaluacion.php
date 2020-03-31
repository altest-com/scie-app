<?php
header("Content-type: text/html; charset=utf8");
include ("../../MySqlConnect.php");
include ("../../conection.php");
$conexion = new MySqlConnect($db, $user, $pswd); 
$IdEvaluacion = $_POST['ID_EVALUACION'];
$TipoEvaluacion = $_POST['TIPO_EVALUACION'];
$MotivoEvaluacion = $_POST['MOTIVO_EVALUACION'];
$ModoEvaluacion = $_POST['MODO_EVALUACION'];
$Corporacion = $_POST['CORPORACION'];
$Dependencia = $_POST['DEPENDENCIA'];
$Adscripcion = $_POST['ADSCRIPCION'];
$Puesto = $_POST['PUESTO'];

$queryEval = sprintf("UPDATE EVALUACION SET TIPO_EVALUACION = '%s', MOTIVO_EVALUACION = '%s', MODO_EVALUACION = '%s' WHERE ID_EVALUACION LIKE '%s';", $TipoEvaluacion, $MotivoEvaluacion, $ModoEvaluacion, $IdEvaluacion);
$queryOficio = sprintf("UPDATE OFICIOS SET CORPORACION = '%s', DEPENDENCIA = '%s', ADSCRIPCION = '%s', PUESTO = '%s' WHERE ID_EVALUACION LIKE '%s';", $Corporacion, $Dependencia, $Adscripcion, $Puesto, $IdEvaluacion);
$conexion->executeInsertQuery($queryEval.$queryOficio, 2);    
$conexion->closeMySqlConnection();
?>