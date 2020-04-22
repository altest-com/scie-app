<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");

$ID_RESULTADO = $_POST['ID_RESULTADO'];
$ID_EXPEDIENTE = $_POST['ID_EXPEDIENTE'];
$MOTIVO = $_POST['MOTIVO'];

    $sql = ("UPDATE NOTIFICACION_HISTORIAL SET MOTIVO = '$MOTIVO' WHERE ID_RESULTADO LIKE '$ID_RESULTADO' AND ID_EXPEDIENTE LIKE '$ID_EXPEDIENTE';");
    $conexion->set_charset("utf8");
    if ($conexion->query($sql) === TRUE) {
        $conexion->set_charset("utf8");
        if ($conexion->query($sql) === TRUE) {
            echo "true";
        }
        else{
            echo "false";
        }
    }
    else {
        echo "false";
    }
$conexion->close();
?>