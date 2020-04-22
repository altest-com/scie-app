<?php
include("../../conexion.php");
include_once "ConexionBD.php"; 

$uploaddir = 'UPLOAD/'; // Relative Upload Location of data file
$ID_CANDIDATO = $_REQUEST['ID_CANDIDATO'];
$ID_EVALUACION = $_REQUEST['ID_EVALUACION'];
$COMENTARIO = $_REQUEST['COMENTARIO'];
$imagen = $_REQUEST['TITULO'];


if (is_uploaded_file($_FILES['file']['tmp_name'])) {
	
	$uploadfile = $uploaddir . basename($imagen.".jpg");
    echo "File ". $_FILES['file']['name'] ." uploaded successfully. ";

    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
    	$isUpdateSuccessfully;
    	$imagen = $imagen.".jpg";
      	$sql = "INSERT INTO medico_fotografias VALUES ('$ID_CANDIDATO','$ID_EVALUACION','$imagen','$COMENTARIO')";

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
        echo "No se subio la fotografia";
    }
}
else {
    echo "false";
    print_r($_FILES);
}
?>