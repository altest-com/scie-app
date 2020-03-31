<?php
{
    include ("../conection.php");
    include ("../MySqlConnect.php");

    $IdEvaluacion = $_POST['ID_EVALUACION'];

    $conexion = new MySqlConnect($db, $user, $pswd);
    $selectQuery = sprintf("SELECT (SELECT ID_EVALUACION FROM EVALUACIONES_INVESTIGADAS WHERE ID_EVALUACION = '%s') AS INV, 
                                        (SELECT ID_EVALUACION FROM registro_huellas_ise WHERE ID_EVALUACION = '%s') AS ASI ;", $IdEvaluacion, $IdEvaluacion);
    $conexion->executeSelectQuery($selectQuery, TRUE);
    $conexion->closeMySqlConnection();
}
?>