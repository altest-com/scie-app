<?php
{
    include ("../conection.php");
    include ("../MySqlConnect.php");

    $IdEvaluacion = $_POST['ID_EVALUACION'];

    if (isset($_POST['ID_EVALUACION']))
    {
        $query = sprintf("SELECT * FROM fotografias_entorno WHERE ID_EVALUACION LIKE '%s';", $IdEvaluacion);
        $conexion = new MySqlConnect($db, $user, $pswd);
        $conexion->executeSelectQuery($query, TRUE);
        $conexion->closeMySqlConnection();
    }
}
?>