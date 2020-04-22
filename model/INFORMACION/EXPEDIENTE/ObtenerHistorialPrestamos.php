<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conection.php");
include("../../MySqlConnect.php");

$ID_EXPEDIENTE = $_POST['ID_EXPEDIENTE'];

    $sql = ("SELECT * FROM HISTORIAL_PRESTAMOS WHERE ID_EXPEDIENTE LIKE '$ID_EXPEDIENTE';");
    $conexion = new MySqlConnect($db, $user, $pswd);
    $conexion -> executeSelectQuery($sql, TRUE);
    $conexion->close();
?>