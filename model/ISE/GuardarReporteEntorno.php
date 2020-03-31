<?php
{
    include ("../conection.php");
    include ("../MySqlConnect.php");

    $idEvaluacion = $_POST['ID_EVALUACION'];
    $idEvaluador = $_POST['ID_EVALUADOR'];
    $descripcion = $_POST['DESCRIPCION'];
    $riesgosCorroborados = $_POST['RIESGOS_CORROBORADOS'];
    $otrosRiesgos = $_POST['OTROS_RIESGOS'];
    $riesgosDescartados = $_POST['RIESGOS_DESCARTADOS'];
    $referencias = $_POST['REFERENCIAS_VECINALES'];
    $observaciones = $_POST['OBSERVACIONES'];

    if (isset($idEvaluacion))
    {
        $conexion = new MySqlConnect($db, $user, $pswd);
        $queryDel = sprintf("DELETE FROM REPORTE_ENTORNO WHERE ID_EVALUACION LIKE '%s';", $idEvaluacion);
        $insertQuery = sprintf("INSERT INTO REPORTE_ENTORNO VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s');", $idEvaluacion, $idEvaluador, $descripcion,
         $riesgosCorroborados, $otrosRiesgos, $riesgosDescartados, $referencias, $observaciones); 
        $updateQuery = sprintf("DELETE FROM EVALUACIONES_INVESTIGADAS WHERE ID_EVALUACION = '%s';", $idEvaluacion);
        $conexion->executeInsertQuery($queryDel.$insertQuery.$updateQuery, 3);
        $conexion->closeMySqlConnection();
    }
}
?>