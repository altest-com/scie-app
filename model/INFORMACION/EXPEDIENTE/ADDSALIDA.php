<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");

$ID_EXPEDIENTE = $_POST['ID_EXPEDIENTE'];
$ID_SALIDA = $_POST['ID_SALIDA'];
$NOMBRE = $_POST['NOMBRE'];
$ASUNTO = $_POST['ASUNTO'];
$DEPARTAMENTO = $_POST['DEPARTAMENTO'];
$FECHA = $_POST['FECHA'];
$FECHA_DEVOLUCION = $_POST['FECHA_DEVOLUCION'];

$resultado = mysqli_query($conexion,"SELECT ID_SALIDA FROM SALIDAS_EXPEDIENTE WHERE ID_SALIDA='$ID_SALIDA'");
$exist=mysqli_fetch_array($resultado);


if($exist[0] === NULL) {
    $sql = ("INSERT INTO SALIDAS_INFORMACION (ID_SALIDA, NOMBRE, ASUNTO, DEPARTAMENTO, FECHA, FECHA_DEVOLUCION) VALUES('$ID_SALIDA', '$NOMBRE', '$ASUNTO', '$DEPARTAMENTO', '$FECHA', '$FECHA_DEVOLUCION')");
    $conexion->set_charset("utf8");
    if ($conexion->query($sql) === TRUE) {
        $sql = ("INSERT INTO SALIDAS_EXPEDIENTE (ID_SALIDA, ID_EXPEDIENTE) VALUES('$ID_SALIDA', '$ID_EXPEDIENTE')");
        $conexion->set_charset("utf8");
        if ($conexion->query($sql) === TRUE) {
            $sql = ("INSERT INTO HISTORIAL_PRESTAMOS (ID_EXPEDIENTE, ID_SALIDA, NOMBRE, ASUNTO, DEPARTAMENTO, FECHA, FECHA_DEVOLUCION, ESTATUS) VALUES('$ID_EXPEDIENTE', '$ID_SALIDA', '$NOMBRE', '$ASUNTO', '$DEPARTAMENTO', '$FECHA', '$FECHA_DEVOLUCION', 'PRESTADO')");
            $conexion->set_charset("utf8");
            if ($conexion->query($sql) === TRUE) {
                echo "true";
            }
            else {
                echo "false";
            }
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