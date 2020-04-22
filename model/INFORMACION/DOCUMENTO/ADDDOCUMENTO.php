<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");

$ID_FOLDER = $_POST['ID_FOLDER'];
$ID_DOCUMENTO = $_POST['ID_DOCUMENTO'];
$NOMBRE = $_POST['NOMBRE'];

$resultado = mysqli_query($conexion,"SELECT ID_DOCUMENTO FROM DOCUMENTO_FOLDER WHERE ID_DOCUMENTO='$ID_DOCUMENTO'");
$exist=mysqli_fetch_array($resultado);

//INSERT INTO DOCUMENTO_INFORMACION (ID_DOCUMENTO, NOMBRE) VALUES('$ID_DOCUMENTO', '$NOMBRE');
if($exist[0] === NULL) {
    $sql = ("INSERT INTO DOCUMENTO_INFORMACION (ID_DOCUMENTO, NOMBRE) VALUES('$ID_DOCUMENTO', '$NOMBRE')");
    $conexion->set_charset("utf8");
    if ($conexion->query($sql) === TRUE) {
        $sql = ("INSERT INTO DOCUMENTO_FOLDER (ID_DOCUMENTO, ID_FOLDER) VALUES('$ID_DOCUMENTO', '$ID_FOLDER')");
        $conexion->set_charset("utf8");
        if ($conexion->query($sql) === TRUE) {
            echo "true";
        }
        else
            "false";
    }
    else {
        echo "false";
    }

}
else
    echo "true";

$conexion->close();

?>