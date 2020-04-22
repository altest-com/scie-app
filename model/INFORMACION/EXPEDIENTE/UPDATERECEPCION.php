<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");

$ID_RECEPCION = $_POST['ID_RECEPCION'];
$PASILLO = $_POST['PASILLO'];
$ESTANTE = $_POST['ESTANTE'];
$FECHA = $_POST['FECHA'];


$sql = ("UPDATE RECEPCION_INFORMACION SET PASILLO='$PASILLO', ESTANTE='$ESTANTE', FECHA='$FECHA' WHERE ID_RECEPCION='$ID_RECEPCION'");
$conexion->set_charset("utf8");
if ($conexion->query($sql) === TRUE) {
    echo "true";
}
else {
    echo "false";
}


$conexion->close();

?>