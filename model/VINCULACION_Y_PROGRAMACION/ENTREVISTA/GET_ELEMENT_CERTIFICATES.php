<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 

error_reporting(0);
 
$CURP = $_POST['CURP'];
$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];

$conexion->set_charset("utf8");

if(empty($CURP) AND empty($ID_CANDIDATO) AND empty($ID_EVALUACION)) {
	print_r("No data");
}
else {
	$myArray = array();
	if ($result = $conexion->query("SELECT * FROM VALIDACION_DOCUMENTOS WHERE (ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION = '$ID_EVALUACION' AND CURP = '$CURP')")) {
 		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray, JSON_PRETTY_PRINT);
    	$result -> close();
	}
}
$conexion -> close();
?>