<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");

$ID_EXPEDIENTE = $_POST['ID_EXPEDIENTE'];
$ID_CONSULTA = $_POST['ID_CONSULTA'];
$CONSULTOR = $_POST['CONSULTOR'];
$FECHA = $_POST['FECHA'];

$resultado = mysqli_query($conexion,"SELECT ID_CONSULTA FROM CONSULTA_EXPEDIENTE WHERE ID_CONSULTA = '$ID_CONSULTA'");
$exist=mysqli_fetch_array($resultado);


if($exist[0] === NULL) {
    $sql = ("INSERT INTO CONSULTA_INFORMACION (ID_CONSULTA, CONSULTOR, FECHA) VALUES('$ID_CONSULTA', '$CONSULTOR', '$FECHA')");
    $conexion->set_charset("utf8");
    if ($conexion->query($sql) === TRUE) {
        $sql = ("INSERT INTO CONSULTA_EXPEDIENTE (ID_CONSULTA, ID_EXPEDIENTE) VALUES('$ID_CONSULTA', '$ID_EXPEDIENTE')");
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