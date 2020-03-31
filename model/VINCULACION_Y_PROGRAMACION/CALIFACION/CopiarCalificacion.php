<?php
{
    error_reporting(0);
    header("Content-type: text/html; charset=utf8");
    include "../../conection.php";
    include "../../MySqlConnect.php";

    $ID_EVALUACION_ORIGEN = $_POST['ID_EVALUACION_ORIGEN'];
    $ID_EVALUACION_DESTINO = $_POST['ID_EVALUACION_DESTINO'];

    $conexion = new MySqlConnect($db, $user, $pswd);
    $isRecordExistQuery = sprintf("SELECT COUNT(*) AS ROW FROM CALIFICACION WHERE ID_EVALUACION = '%s'", $ID_EVALUACION_DESTINO);
    if (intval($conexion->getSingleValueFromQuery($isRecordExistQuery)) === 0)
    {
        $insquery = sprintf("INSERT INTO CALIFICACION (SELECT * FROM CALIFICACION WHERE ID_EVALUACION = '%s');", $ID_EVALUACION_ORIGEN);
        $updateQuery = sprintf("UPDATE CALIFICACION SET ID_EVALUACION = '%s' WHERE ID_EVALUACION LIKE '%s' LIMIT 1", $ID_EVALUACION_DESTINO, $ID_EVALUACION_ORIGEN);
        $conexion->executeInsertQuery($insquery);
        $conexion->executeInsertQuery($updateQuery);
    }
    $conexion->closeMySqlConnection();
}
?>