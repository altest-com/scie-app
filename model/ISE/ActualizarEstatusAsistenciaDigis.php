<?php
{
    include ("../conection.php");
    include ("../MySqlConnect.php");

    $IdEvaluacion = $_POST['ID_EVALUACION'];
    $Estatus = (int)$_POST['ESTATUS']; // Si true: insertar; si false: eliminar

    if (isset($IdEvaluacion))
    {
        if ($Estatus === 0) // true
        {
            $InsertQuery = sprintf("INSERT INTO REGISTRO_HUELLAS_ISE VALUES ((SELECT FOLIO FROM EVALUACION WHERE ID_EVALUACION = '%s'), 
                        (SELECT ID_CANDIDATO FROM EVALUACION WHERE ID_EVALUACION LIKE '%s'), '%s');", $IdEvaluacion, $IdEvaluacion, $IdEvaluacion);
        }
        else // false
        {
            $InsertQuery = sprintf("DELETE FROM REGISTRO_HUELLAS_ISE WHERE FOLIO LIKE (SELECT FOLIO FROM EVALUACION WHERE ID_EVALUACION = '%s') AND
                        ID_CANDIDATO LIKE (SELECT ID_CANDIDATO FROM EVALUACION WHERE ID_EVALUACION LIKE '%s') AND ID_EVALUACION LIKE '%s';", 
                        $IdEvaluacion, $IdEvaluacion, $IdEvaluacion);
        }
        $conexion = new MySqlConnect($db, $user, $pswd);
        $conexion->executeInsertQuery($InsertQuery);
        $conexion->closeMySqlConnection();
    }
}
?>