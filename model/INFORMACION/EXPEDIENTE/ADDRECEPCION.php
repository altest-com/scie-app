<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");

$ID_EXPEDIENTE = $_POST['ID_EXPEDIENTE'];
$ID_RECEPCION = $_POST['ID_RECEPCION'];
$PASILLO = $_POST['PASILLO'];
$ESTANTE = $_POST['ESTANTE'];
$FECHA = $_POST['FECHA'];

$resultado = mysqli_query($conexion,"SELECT ID_RECEPCION FROM RECEPCION_EXPEDIENTE WHERE ID_RECEPCION='$ID_RECEPCION'");
$exist=mysqli_fetch_array($resultado);


if($exist[0] === NULL) {
    $sql = ("INSERT INTO RECEPCION_INFORMACION (ID_RECEPCION, PASILLO, ESTANTE, FECHA) VALUES('$ID_RECEPCION', '$PASILLO', '$ESTANTE', '$FECHA')");
    $conexion->set_charset("utf8");
    if ($conexion->query($sql) === TRUE) {
        $sql = ("INSERT INTO RECEPCION_EXPEDIENTE (ID_RECEPCION, ID_EXPEDIENTE) VALUES('$ID_RECEPCION', '$ID_EXPEDIENTE')");
        $conexion->set_charset("utf8");
        if ($conexion->query($sql) === TRUE) {
            echo "true";
        }
        else
            echo "false";
    }
    else {
        echo "false";
    }    
}
else
    echo "true";

$conexion->close();

?>