<?php
include("../../conexion.php");

	$ARCHIVO = $_POST['ARCHIVO'];
    $ID_EVALUACION  = $_POST['ID_EVALUACION'];
    $FILE = $_POST['FILE_TYPE'];
    $sql = "UPDATE plataforma_mexico SET $FILE = '$ARCHIVO' WHERE ID_EVALUACION  = '$ID_EVALUACION'";

    $conexion->set_charset("utf8");
    if ($conexion->query($sql) === TRUE) {
        $isUpdateSuccessfully = "true";
    } else {
        $isUpdateSuccessfully = "false";
    }
    $conexion->close();
    if($isUpdateSuccessfully){
        echo "true";
    }

?>