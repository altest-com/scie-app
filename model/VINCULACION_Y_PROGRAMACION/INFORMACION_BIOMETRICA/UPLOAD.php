<?php
include("../../conexion.php");

$uploaddir = 'UPLOAD/'; // Relative Upload Location of data file
$ID_CANDIDATO = $_REQUEST['ID_CANDIDATO'];



if (is_uploaded_file($_FILES['file']['tmp_name'])) {
    echo "File ". $_FILES['file']['name'] ." uploaded successfully. ";
    $ext = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);

if ($result = $conexion->query(sprintf("SELECT CURP FROM candidatos WHERE ID_CANDIDATO = \"%s\" ",$ID_CANDIDATO))) {

        $row = mysqli_fetch_array($result);

        if($row[0] !== NULL){
            //echo sprintf("%s", $row[0]);
        }
        else{
            echo "false";
        }

}

    $uploadfile = $uploaddir . basename($row[0]."."."fpt");
    $Nombre = pathinfo($uploadfile, PATHINFO_BASENAME);

    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
    	$isUpdateSuccessfully;
    	$documenPtath = basename($row[0]);
      	$sql = "UPDATE candidatos SET HUELLA_DIGITAL = '$Nombre' WHERE ID_CANDIDATO = '$ID_CANDIDATO'";

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
        echo "false";
    }
}
else {
    echo "false";
    print_r($_FILES);
}
?>
