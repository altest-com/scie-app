<?php
{
    include ("../conection.php");
    include ("../MySqlConnect.php");

    $IdEvaluacion = $_POST['ID_EVALUACION'];

    if (isset($IdEvaluacion))
    {
        $conexion = new MySqlConnect($db, $user, $pswd);
        $selectQuery = sprintf("SELECT * FROM INVESTIGACION_ANTECEDENTES WHERE ID_EVALUACION = '%s';", $IdEvaluacion);
        $conexion->executeSelectQuery($selectQuery, TRUE);
        $conexion->closeMySqlConnection();
    }
}
?>