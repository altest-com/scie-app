<?php
include("../../conexion.php");

$uploaddir = 'UPLOADFILE/'; // Relative Upload Location of data file
$ID_EVALUACION  = $_REQUEST['ID_EVALUACION'];

if (is_uploaded_file($_FILES['file']['tmp_name'])) {
    echo "File ". $_FILES['file']['name'] ." uploaded successfully. ";
    $ext = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);


    if (isset($_REQUEST['TELESCAN']))
    {
        $uploadfile = $uploaddir . basename($ID_EVALUACION)."_TELESCAN".".".$ext;
    }
    else
    {
        $uploadfile = $uploaddir . basename($ID_EVALUACION).".".$ext;
    }
    

    $Nombre = pathinfo($uploadfile, PATHINFO_BASENAME);

    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
        $isUpdateSuccessfully;
        $picturePath = basename($ID_EVALUACION);
        if (isset($_REQUEST['TELESCAN']))
        {
            $sql = "UPDATE SIIEC.digiscan SET TELESCAN = '$Nombre' WHERE ID_EVALUACION  = '$ID_EVALUACION'";

            $conexion->set_charset("utf8");
            if ($conexion->query($sql) === TRUE) {
                $isUpdateSuccessfully = "true";
            } else {
                $isUpdateSuccessfully = "false";
            }
            $conexion->close();
        }
        else
        {
            $sql = "UPDATE SIIEC.digiscan SET ARCHIVO = '$Nombre' WHERE ID_EVALUACION  = '$ID_EVALUACION'";

            $conexion->set_charset("utf8");
            if ($conexion->query($sql) === TRUE) {
                $isUpdateSuccessfully = "true";
            } else {
                $isUpdateSuccessfully = "false";
            }
            $conexion->close();
        }

        if($isUpdateSuccessfully){
            echo "true";
        }
    }
    else{
        print_r($_FILES);
        echo "No se subio la fotografia";
    }
}
else {
    echo "false";
    print_r($_FILES);
}
?>