<?php
include("../../conexion.php");

$uploaddir = 'FILES/'; // Relative Upload Location of data file
$ID_CANDIDATO = $_REQUEST['ID_CANDIDATO'];
$ID_EVALUACION = $_REQUEST['ID_EVALUACION'];
$TIPO = $_REQUEST['TIPO'];
$OFICIO_E = $_REQUEST['OFICIO_E'];
$OFICIO_R = $_REQUEST['OFICIO_R'];



	if ($TIPO == 1) {
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            $imagen = "CERTIFICADO_DE_ESTUDIOS_PR_".$ID_EVALUACION;
            $uploadfile = $uploaddir . basename($imagen.".pdf");
            echo "File ". $_FILES['file']['name'] ." uploaded successfully. ";

            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $isUpdateSuccessfully;
                $imagen = $imagen.".pdf";
                $sql = "UPDATE validacion_documentos SET CERTIFICADO_DE_ESTUDIOS_PR = '$imagen', NO_OFICIO_ENVIO_CE_PR = '$OFICIO_E', NO_OFICIO_RECEPCION_CE_PR = '$OFICIO_R' WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION ='$ID_EVALUACION'";

                $conexion->set_charset("utf8");
                if ($conexion->query($sql) === TRUE) {
                    $isUpdateSuccessfully = "   true";
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
                echo "No se subio el documento";
            }
        }
        else {
            echo "false";
            print_r($_FILES);
        }
    }
    else if ($TIPO == 2) {
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            $imagen = "CERTIFICADO_DE_ESTUDIOS_SEC_".$ID_EVALUACION;
            $uploadfile = $uploaddir . basename($imagen.".pdf");
            echo "File ". $_FILES['file']['name'] ." uploaded successfully. ";

            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $isUpdateSuccessfully;
                $imagen = $imagen.".pdf";
                $sql = "UPDATE validacion_documentos SET CERTIFICADO_DE_ESTUDIOS_SEC = '$imagen',NO_OFICIO_ENVIO_CE_SEC = '$OFICIO_E', NO_OFICIO_RECEPCION_CE_SEC = '$OFICIO_R' WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION ='$ID_EVALUACION'";

                $conexion->set_charset("utf8");
                if ($conexion->query($sql) === TRUE) {
                    $isUpdateSuccessfully = "   true";
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
                echo "No se subio el documento";
            }
        }
        else {
            echo "false";
            print_r($_FILES);
        }
    }
    else if ($TIPO == 3) {
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            $imagen = "CERTIFICADO_DE_ESTUDIOS_PREP_".$ID_EVALUACION;
            $uploadfile = $uploaddir . basename($imagen.".pdf");
            echo "File ". $_FILES['file']['name'] ." uploaded successfully. ";

            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $isUpdateSuccessfully;
                $imagen = $imagen.".pdf";
                $sql = "UPDATE validacion_documentos SET CERTIFICADO_DE_ESTUDIOS_PREP = '$imagen',NO_OFICIO_ENVIO_CE_PREP = '$OFICIO_E', NO_OFICIO_RECEPCION_CE_PREP = '$OFICIO_R' WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION ='$ID_EVALUACION'";

                $conexion->set_charset("utf8");
                if ($conexion->query($sql) === TRUE) {
                    $isUpdateSuccessfully = "   true";
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
                echo "No se subio el documento";
            }
        }
        else {
            echo "false";
            print_r($_FILES);
        }
    }
    else if ($TIPO == 4) {
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            $imagen = "CERTIFICADO_DE_ESTUDIOS_UNI_".$ID_EVALUACION;
            $uploadfile = $uploaddir . basename($imagen.".pdf");
            echo "File ". $_FILES['file']['name'] ." uploaded successfully. ";

            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $isUpdateSuccessfully;
                $imagen = $imagen.".pdf";
                $sql = "UPDATE validacion_documentos SET CERTIFICADO_DE_ESTUDIOS_UNI = '$imagen',NO_OFICIO_ENVIO_CE_UNI = '$OFICIO_E', NO_OFICIO_RECEPCION_CE_UNI = '$OFICIO_R' WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION ='$ID_EVALUACION'";

                $conexion->set_charset("utf8");
                if ($conexion->query($sql) === TRUE) {
                    $isUpdateSuccessfully = "   true";
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
                echo "No se subio el documento";
            }
        }
        else {
            echo "false";
            print_r($_FILES);
        }
    }
    else if ($TIPO == 5) {
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            $imagen = "CARTILLA_MILITAR_".$ID_EVALUACION;
            $uploadfile = $uploaddir . basename($imagen.".pdf");
            echo "File ". $_FILES['file']['name'] ." uploaded successfully. ";

            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $isUpdateSuccessfully;
                $imagen = $imagen.".pdf";
                $sql = "UPDATE validacion_documentos SET CARTILLA_MILITAR = '$imagen',  NO_OFICIO_ENVIO_CM = '$OFICIO_E', NO_OFICIO_RECEPCION_CM = '$OFICIO_R' WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION ='$ID_EVALUACION'";

                $conexion->set_charset("utf8");
                if ($conexion->query($sql) === TRUE) {
                    $isUpdateSuccessfully = "   true";
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
                echo "No se subio el documento";
            }
        }
        else {
            echo "false";
            print_r($_FILES);
        }
    }
?>