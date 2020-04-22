<?php
include("../../conexion.php");

$uploaddir = 'DOCUMENTOS/'; // Relative Upload Location of data file
$ID_DOCUMENTO = $_REQUEST['ID_DOCUMENTO'];


if (is_uploaded_file($_FILES['file']['tmp_name'])) {
    $uploadfile = $uploaddir . basename("$ID_DOCUMENTO" . ".jpeg");
    //echo "File ". $_FILES['file']['name'] ." uploaded successfully. ";

    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
    	$isUpdateSuccessfully;
    	$picturePath = basename($ID_DOCUMENTO.".jpeg");
      	$sql = "UPDATE DOCUMENTO_INFORMACION SET IMAGEN='$picturePath' WHERE ID_DOCUMENTO='$ID_DOCUMENTO'";

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