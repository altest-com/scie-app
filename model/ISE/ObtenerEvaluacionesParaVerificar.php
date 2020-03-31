<?php
{
    include ("../conection.php");
    include ("../MySqlConnect.php");

    $conexion = new MySqlConnect($db, $user, $pswd);
    $selectQuery = sprintf("SELECT * FROM EVALUACIONES_INVESTIGADAS;");
    $conexion->executeSelectQuery($selectQuery, TRUE);
    $conexion->closeMySqlConnection();
}
?>