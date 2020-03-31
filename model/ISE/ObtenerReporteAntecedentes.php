<?php
{
    include ("../conection.php");
    include ("../MySqlConnect.php");

    $IdEvaluacion = $_POST['ID_EVALUACION'];

    if (isset($IdEvaluacion))
    {
        $conexion = new MySqlConnect($db, $user, $pswd);
        $SelectQuery = sprintf("SELECT DISTINCT * FROM REPORTE_ANTECEDENTES WHERE ID_EVALUACION = '%s';", $IdEvaluacion);
        $conexion->executeSelectQuery($SelectQuery, TRUE);
        $conexion->closeMySqlConnection();
    }
}
?>