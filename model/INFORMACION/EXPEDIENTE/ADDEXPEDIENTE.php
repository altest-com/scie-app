<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");

$ID_EXPEDIENTE = $_POST['ID_EXPEDIENTE'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];

$resultado = mysqli_query($conexion,"SELECT ID_EXPEDIENTE FROM EXPEDIENTE_INFORMACION WHERE ID_EXPEDIENTE = '$ID_EXPEDIENTE'");
$exist=mysqli_fetch_array($resultado);


if($exist[0] === NULL) {
    $sql = ("INSERT INTO EXPEDIENTE_INFORMACION (ID_EXPEDIENTE, ID_EVALUACION) VALUES('$ID_EXPEDIENTE', '$ID_EVALUACION')");
    $conexion->set_charset("utf8");
    if ($conexion->query($sql) === TRUE) {
        echo "true";
    }
    else {
        echo "false";
    }

}
else
    echo "true";

$conexion->close();

?>