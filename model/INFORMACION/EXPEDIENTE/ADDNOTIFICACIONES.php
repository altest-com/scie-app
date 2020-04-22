<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");

$ID_RESULTADO = $_POST['ID_RESULTADO'];
$ID_EXPEDIENTE = $_POST['ID_EXPEDIENTE'];
$OFICIO = $_POST['OFICIO'];
$FECHA = $_POST['FECHA'];

$resultado = mysqli_query($conexion,"SELECT ID_RESULTADO FROM NOTIFICACION_EXPEDIENTE WHERE ID_RESULTADO='$ID_RESULTADO'");
$exist=mysqli_fetch_array($resultado);

if($exist[0] === NULL) {
    // No existe, crear nuevo registro
    $sql = ("INSERT INTO NOTIFICACION_INFORMACION (ID_RESULTADO, OFICIO, FECHA) VALUES('$ID_RESULTADO', '$OFICIO', '$FECHA')");
    $conexion->set_charset("utf8");
    if ($conexion->query($sql) === TRUE) {
        $sql = ("INSERT INTO NOTIFICACION_EXPEDIENTE (ID_RESULTADO, ID_EXPEDIENTE) VALUES('$ID_RESULTADO', '$ID_EXPEDIENTE')");
        $conexion->set_charset("utf8");
        if ($conexion->query($sql) === TRUE) {
            $sql = ("INSERT INTO NOTIFICACION_HISTORIAL (ID_RESULTADO, ID_EXPEDIENTE, OFICIO, FECHA, MOTIVO) VALUES('$ID_RESULTADO', '$ID_EXPEDIENTE', '$OFICIO', '$FECHA', 'Actual')");
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
{
    echo "true";
}
$conexion->close();
?>