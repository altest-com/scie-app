<?php
include("../../conexion.php");

if (isset($_REQUEST['ARCHIVO'])) {
    $ARCHIVO = $_REQUEST['ARCHIVO'];

    $ID_EVALUACION  = $_REQUEST['ID_EVALUACION'];
    $FILE = $_REQUEST['FILE_TYPE'];
    $sql = "UPDATE SIIEC.PLATAFORMA_MEXICO SET $FILE = '$ARCHIVO' WHERE ID_EVALUACION  = '$ID_EVALUACION'";

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
    else{
        echo 'false';
    }
}
else{
    $uploaddir = 'FILES/'; // Relative Upload Location of data file
    $ID_EVALUACION  = $_REQUEST['ID_EVALUACION'];
    $FILE = $_REQUEST['FILE_TYPE'];


    if (is_uploaded_file($_FILES['file']['tmp_name'])) {
        echo "File ". $_FILES['file']['name'] ." uploaded successfully. ";
        $ext = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
        $uploadfile = $uploaddir.basename($FILE."_".$ID_EVALUACION).".".$ext;
        $Nombre = pathinfo($uploadfile, PATHINFO_BASENAME);

        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
            $isUpdateSuccessfully;
            $sql = "UPDATE SIIEC.PLATAFORMA_MEXICO SET $FILE = '$Nombre' WHERE ID_EVALUACION  = '$ID_EVALUACION'";

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
        }
        else{
            print_r($_FILES);
            echo "No se subio el archivo";
        }
    }
    else {
        echo "false";
        print_r($_FILES);
    }
}

?>