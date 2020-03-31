<?php
{
    include ("../conection.php");
    include ("../MySqlConnect.php");

    $idEvaluacion = $_POST['ID_EVALUACION'];

    if (isset($idEvaluacion))
    {
        $conexion = new MySqlConnect($db, $user, $pswd);
        $selectQuery = sprintf("SELECT * FROM REPORTE_ENTORNO WHERE ID_EVALUACION = '%s';", $idEvaluacion); // Si es 1: Si requiere investigación de verificación del entorno
        $conexion->executeSelectQuery($selectQuery, TRUE);
        $conexion->closeMySqlConnection();
    }
}
?>