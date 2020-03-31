<?php
{
    header ("Content-type: text/html; charset=utf8");
    header ('Content-type:application/json');
    include ("../../MySqlConnect.php");
    include ("../../connection.php");

    $PROCESO = $_POST['PROCESO'];
    $CURP = $_POST['CURP'];

    if (isset($CURP) && isset($PROCESO))
    {
        $query = sprintf("INSERT INTO CURP_EXTRAORDINARIA VALUES ('%s', '%s')", $PROCESO, $CURP);
        $conexion = new MySqlConnect($db, $user, $pswd);
        $conexion->executeInsertQuery($query);
        $conexion->closeMySqlConnection();
    }
}
?>