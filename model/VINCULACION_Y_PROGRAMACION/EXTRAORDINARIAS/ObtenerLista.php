<?php
{
    header ("Content-type: text/html; charset=utf8");
    header ('Content-type:application/json');
    include ("../../MySqlConnect.php");
    include ("../../connection.php");

    $query = sprintf("SELECT * FROM CURP_EXTRAORDINARIAS");
    $conexion = new MySqlConnect($db, $user, $pswd);
    $conexion->executeSelectQuery($query, TRUE);
    $conexion->closeMySqlConnection();
}
?>