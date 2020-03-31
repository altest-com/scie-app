<?php
{
    include ("../conection.php");
    include ("../MySqlConnect.php");

    $IdEvaluacion = $_POST['ID_EVALUACION'];

    if (isset($IdEvaluacion))
    {
        $conexion = new MySqlConnect($db, $user, $pswd);
        $SelectQuery = sprintf("SELECT 
                                (SELECT PUESTO_FUNCIONAL FROM PSICOLOGIA_REPORTE WHERE ID_EVALUACION LIKE '%s') AS PUESTO, 
                                (SELECT ADSCRIPCION FROM OFICIOS WHERE ID_EVALUACION LIKE '%s') AS ADS, 
                                (SELECT CUIP FROM PLATAFORMA_MEXICO WHERE ID_EVALUACION LIKE '%s') AS CUIP;", $IdEvaluacion, $IdEvaluacion, $IdEvaluacion);
        $conexion->executeSelectQuery($SelectQuery, TRUE);
        $conexion->closeMySqlConnection();
    }
}
?>