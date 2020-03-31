<?php
{
    header("Content-Type: text/html;charset=utf-8");
    include ("../../conection.php");
    include ("../../mySqlConnect.php");

    $sql = sprintf("SELECT * FROM LUGARES_DISPONIBLES;");
    $conexion = new MySqlConnect($db, $user, $pswd);
    $conexion->executeSelectQuery($sql, TRUE);
    $conexion->closeMySqlConnection();
}
?>