<?php
include("../../conexion.php");

$uploaddir = 'UPLOAD/'; // Relative Upload Location of data file
$curp = $_REQUEST['CURP'];
$ID_CANDIDATO = $_REQUEST['ID_CANDIDATO'];
$ID_EVALUACION = $_REQUEST['ID_EVALUACION'];



$sqlDel = ("DELETE FROM fotografias WHERE ID_EVALUACION = '$ID_EVALUACION'");
$conexion->set_charset("utf8");

    if ($conexion->query($sqlDel) === TRUE) {
        echo "true";
    } else {
        echo "false";
}

if (is_uploaded_file($_FILES['file']['tmp_name'])) {
    echo "File ". $_FILES['file']['name'] ." uploaded successfully. ";
    $ext = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);


        $resultado = mysqli_query($conexion,"SELECT COUNT(*) AS id FROM fotografias ");
        $line=mysqli_fetch_array($resultado);
    
    $numero = (int)$line[0] + 1;

    $uploadfile = $uploaddir . basename($curp.$numero).".".$ext;

    $Nombre = pathinfo($uploadfile, PATHINFO_BASENAME);

    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
    	$isUpdateSuccessfully;
    	$documenPtath = basename($curp);


      	$sql = "INSERT INTO fotografias (ID_CANDIDATO,ID_EVALUACION,CURP,ARCHIVO) VALUES('$ID_CANDIDATO','$ID_EVALUACION', '$curp','$Nombre')";
        $sqlUpdate = "UPDATE candidatos SET FOTOGRAFIA = (SELECT ARCHIVO FROM FOTOGRAFIAS WHERE ID_EVALUACION = '$ID_EVALUACION') WHERE ID_CANDIDATO = '$ID_CANDIDATO'";

		$conexion->set_charset("utf8");
		if ($conexion->query($sql) === TRUE) {
   			$isUpdateSuccessfully = "true";
            if ($conexion -> query($sqlUpdate) === TRUE){
                $isUpdateSuccessfully = "true";
            }
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
