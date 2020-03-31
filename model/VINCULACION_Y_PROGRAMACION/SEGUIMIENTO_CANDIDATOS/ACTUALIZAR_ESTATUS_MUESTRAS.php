<?php
header("Content-Type: text/html;charset=utf-8");
include ("../../conection.php");
include ("../../MySqlConnect.php");

//error_reporting(0);

$VALOR = $_POST['VALOR'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];

if (isset($VALOR) && isset($ID_EVALUACION))
{
    $conexion = new MySqlConnect($db, $user, $pswd);
    $query = sprintf("UPDATE SEGUIMIENTO_CANDIDATOS SET MUESTRA_TOX = '%s' WHERE ID_EVALUACION LIKE '%s';", $VALOR, $ID_EVALUACION);
    $conexion->executeInsertQuery($query);
    $conexion->closeMySqlConnection();
}

?>