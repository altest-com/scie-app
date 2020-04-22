<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");

$ID_RESULTADO = $_POST['ID_RESULTADO'];
$ID_EXPEDIENTE = $_POST['ID_EXPEDIENTE'];

    $sql = ("DELETE FROM NOTIFICACION_INFORMACION WHERE ID_RESULTADO LIKE '$ID_RESULTADO';");
    $conexion->set_charset("utf8");
    if ($conexion->query($sql) === TRUE) {
        $sql = ("DELETE FROM NOTIFICACION_EXPEDIENTE WHERE ID_RESULTADO LIKE '$ID_RESULTADO' AND ID_EXPEDIENTE LIKE '$ID_EXPEDIENTE';");
        $conexion->set_charset("utf8");
        if ($conexion->query($sql) === TRUE) {
            echo "true";
        }
        else {
            echo "false";
        }
    }
    else {
        echo "false";
    }
$conexion->close();
?>