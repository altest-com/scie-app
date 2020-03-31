<?php
include("../../conexion.php");

$uploaddir = 'UPLOAD/'; // Relative Upload Location of data file
$curp = $_REQUEST['CURP'];


if (is_uploaded_file($_FILES['file']['tmp_name'])) {
    $uploadfile = $uploaddir . basename($curp.".jpg");
    echo "File ". $_FILES['file']['name'] ." uploaded successfully. ";

    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
    	$isUpdateSuccessfully;
    	$picturePath = basename($curp.".jpg");
      	$sql = "UPDATE SIIEC.CANDIDATOS SET FOTOGRAFIA = '$picturePath' WHERE CURP = '$curp'";

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