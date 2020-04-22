<?php
{
    header("Content-type: text/html; charset=utf8");
    include ("../conection.php");
    include ("../MySqlConnect.php");

    $conexion = new MySqlConnect($db, $user, $pswd);
    $query = sprintf("SELECT CONCAT(PRIMER_APELLIDO, ' ', SEGUNDO_APELLIDO, ' ', PRIMER_NOMBRE, ' ', SEGUNDO_NOMBRE) AS NOMBRE, CANDIDATOS.ID_CANDIDATO, EVALUACION.ID_EVALUACION
    FROM EVALUACION INNER JOIN CANDIDATOS ON (CANDIDATOS.ID_CANDIDATO = EVALUACION.ID_CANDIDATO) WHERE EVALUACION.AUTORIZACION LIKE 'NNN' OR EVALUACION.AUTORIZACION LIKE 'NE';");
    $conexion->executeSelectQuery($query, TRUE);
    $conexion->closeMySqlConnection();
}
?>