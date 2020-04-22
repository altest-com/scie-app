<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");

$ID_FOLDER = $_POST['ID_FOLDER'];
$ID_EXPEDIENTE = $_POST['ID_EXPEDIENTE'];
$NOMBRE = $_POST['NOMBRE'];

$resultado = mysqli_query($conexion,"SELECT ID_FOLDER FROM FOLDER_EXPEDIENTE WHERE ID_FOLDER='$ID_FOLDER'");
$exist=mysqli_fetch_array($resultado);

if($exist[0] === NULL) {
    $sql = ("INSERT INTO FOLDER_INFORMACION (ID_FOLDER, NOMBRE) VALUES('$ID_FOLDER', '$NOMBRE')");

    $sql2 = ("INSERT INTO FOLDER_EXPEDIENTE (ID_FOLDER, ID_EXPEDIENTE) VALUES('$ID_FOLDER', '$ID_EXPEDIENTE')");

    $conexion->set_charset("utf8");
    if ($conexion->query($sql) === TRUE) {
        echo "true";
    }
    else {
        echo "false";
    }


    if ($conexion->query($sql2) === TRUE) {
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