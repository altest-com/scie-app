<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conection.php");
include("../../MySqlConnect.php");

$ID_EXPEDIENTE = $_POST['ID_EXPEDIENTE'];

    //$sql = ("SELECT NH.ID_EXPEDIENTE, NH.MOTIVO, NI.* FROM NOTIFICACION_HISTORIAL NH INNER JOIN NOTIFICACION_INFORMACION NI ON (NH.ID_RESULTADO = NI.ID_RESULTADO) WHERE NH.ID_EXPEDIENTE LIKE  '$ID_EXPEDIENTE';");
    $sql = ("SELECT NH.* FROM NOTIFICACION_HISTORIAL NH WHERE NH.ID_EXPEDIENTE LIKE '$ID_EXPEDIENTE';");
    $conexion = new MySqlConnect($db, $user, $pswd);
    $conexion->executeSelectQuery($sql, TRUE);
    $conexion->closeMySqlConnection();
?>