<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conection.php");
include("../../MySqlConnect.php");

$ID_RESULTADO = $_POST['ID_RESULTADO'];
$FECHA_CORP = $_POST['FECHA_CORP'];
$OFICIO_CORP = $_POST['OFICIO_CORP'];

    $sql = sprintf("UPDATE NOTIFICACION_INFORMACION SET OFICIO_CORPORACION = '%s', FECHA_CORPORACION = '%s' WHERE ID_RESULTADO LIKE '%s';", $OFICIO_CORP, $FECHA_CORP, $ID_RESULTADO);
    $sql2 = sprintf("UPDATE NOTIFICACION_HISTORIAL SET OFICIO_CORPORACION = '%s', FECHA_CORPORACION = '%s' WHERE ID_RESULTADO LIKE '%s';", $OFICIO_CORP, $FECHA_CORP, $ID_RESULTADO);
    $conexion = new MySqlConnect($db, $user, $pswd);
    $conexion -> executeInsertQuery($sql.$sql2, 2);
    $conexion->closeMySqlConnection();
?>