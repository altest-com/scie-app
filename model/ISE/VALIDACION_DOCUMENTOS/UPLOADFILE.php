<?php
include("../../conexion.php");

$uploaddir = 'FILES/'; // Relative Upload Location of data file
$ID_EVALUACION  = $_REQUEST['ID_EVALUACION'];
$TIPO = $_REQUEST['TIPO_CERTIFICADO'];
$OFICIO_DE_ENVIO = $_REQUEST['OFICIO_ENVIO'];
$OFICIO_DE_RECEPCION = $_REQUEST['OFICIO_RECEPCION'];

$TIPOSTR;
switch ((int)$TIPO) {
    case 100:
        $TIPOSTR = "CERT_PRIMARIA";
        break;
    case 101:
        $TIPOSTR = "CERT_SECUNDARIA";
        break;
    case 102:
        $TIPOSTR = "CERT_PREPARATORIA";
        break;
    case 103:
        $TIPOSTR = "CERT_LICENCIATURA";
        break;
    case 104:
        $TIPOSTR = "CERT_MAESTRIA";
        break;
    case 105:
        $TIPOSTR = "CERT_DOCTORADO";
        break;
    case 106:
        $TIPOSTR = "CONSTANCIA";
        break;
    case 107:
        $TIPOSTR = "CARTILLA";
        break;
    default:
        # code...
        break;
}

if (is_uploaded_file($_FILES['file']['tmp_name'])) {
    echo "File ".$_FILES['file']['name']." uploaded successfully.";
    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $uploadfile = $uploaddir.basename($ID_EVALUACION."_".$TIPOSTR).".".$ext;
    $NOMBRE = pathinfo($uploadfile, PATHINFO_BASENAME);

    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
        $sql = "INSERT INTO certificados VALUES ('$ID_EVALUACION', '$TIPO', '$NOMBRE', '$OFICIO_DE_ENVIO', '$OFICIO_DE_RECEPCION')";
        $conexion->set_charset("utf8");
        if ($conexion->query($sql) === TRUE) {
            echo "true";
        } 
        else {
            echo "false";
        }
        $conexion->close();
    }
    else{
        print_r($_FILES);
        echo "File didn't move";
    }
}
else {
    echo "The following file were not uploaded";
    print_r($_FILES);
}
?>