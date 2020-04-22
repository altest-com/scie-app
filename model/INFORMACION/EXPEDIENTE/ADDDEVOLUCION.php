<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");

$ID_EXPEDIENTE = $_POST['ID_EXPEDIENTE'];
$ID_DEVOLUCION = $_POST['ID_DEVOLUCION'];
$ID_SALIDA = $_POST['ID_SALIDA'];
$FECHA = $_POST['FECHA'];

$resultado = mysqli_query($conexion,"SELECT ID_DEVOLUCION FROM DEVOLUCION_EXPEDIENTE WHERE ID_DEVOLUCION='$ID_DEVOLUCION'");
$exist=mysqli_fetch_array($resultado);


if($exist[0] === NULL) {
    $sql = ("INSERT INTO DEVOLUCION_INFORMACION (ID_DEVOLUCION, ID_SALIDA, FECHA) VALUES('$ID_DEVOLUCION', '$ID_SALIDA', '$FECHA')");
    $conexion->set_charset("utf8");
    if ($conexion->query($sql) === TRUE) {
        $sql = ("INSERT INTO DEVOLUCION_EXPEDIENTE (ID_DEVOLUCION, ID_EXPEDIENTE) VALUES('$ID_DEVOLUCION', '$ID_EXPEDIENTE')");
        $conexion->set_charset("utf8");
        if ($conexion->query($sql) === TRUE) {
            $sql = ("UPDATE HISTORIAL_PRESTAMOS SET ESTATUS = 'DEVUELTO', FECHA_DEVOLUCION = '$FECHA' WHERE ID_SALIDA LIKE '$ID_SALIDA' AND ID_EXPEDIENTE LIKE '$ID_EXPEDIENTE'");
            $conexion->set_charset("utf8");
            if ($conexion->query($sql) === TRUE) {
                echo "true";
            }
            else{
                echo "false";
            }
        }
        else{
            echo "false";
        }
    }
    else {
        echo "false";
    }

}
else
    echo "true";

$conexion->close();

?>