<?php
{
    include ("../conection.php");
    include ("../MySqlConnect.php");

    $conexion = new MySqlConnect($db, $user, $pswd);
    $selectQuery = sprintf("SELECT * FROM CERTIFICADOS WHERE OFICIO_RECEPCION = '';");
    $conexion->executeSelectQuery($selectQuery, TRUE);
    $conexion->closeMySqlConnection();
}
?>