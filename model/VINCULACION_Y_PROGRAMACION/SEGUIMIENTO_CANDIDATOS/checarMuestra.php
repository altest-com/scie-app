<?php
header("Content-Type: text/html;charset=utf-8");
include ("../../conection.php");
include ("../../MySqlConnect.php");

//error_reporting(0);

$ID_EVALUACION = $_POST['ID_EVALUACION'];

if (isset($ID_EVALUACION))
{
    $conexion = new MySqlConnect($db, $user, $pswd);
    $query = sprintf("SELECT MUESTRA_TOX AS ROW FROM SEGUIMIENTO_CANDIDATOS WHERE ID_EVALUACION = '%s';", $ID_EVALUACION);
    echo $conexion->getSingleValueFromQuery($query);
    $conexion->closeMySqlConnection();
}

?>