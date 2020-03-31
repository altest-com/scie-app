<?php
include("../conexion.php");

$uploaddir = 'UPLOAD/'; // Relative Upload Location of data file
$curp = $_REQUEST['CURP'];
$ID_EVALUACION = $_REQUEST['ID_EVALUACION'];



if (is_uploaded_file($_FILES['file']['tmp_name'])) {
    echo "File ". $_FILES['file']['name'] ." uploaded successfully. ";
    $ext = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);


        $resultado = mysqli_query($conexion,"SELECT COUNT(*) AS id FROM fotografias_entorno ");
        $line=mysqli_fetch_array($resultado);
    
    $numero = (int)$line[0] + 1;

    $uploadfile = $uploaddir . basename($curp.$numero).".".$ext;

    $Nombre = pathinfo($uploadfile, PATHINFO_BASENAME);

    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
    	$isUpdateSuccessfully;
        $documenPtath = basename($curp);
      	$sql = "INSERT INTO fotografias_entorno (ID_EVALUACION, NOMBRE) VALUES ('$ID_EVALUACION', '$Nombre')";

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
