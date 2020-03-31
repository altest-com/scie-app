<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 
error_reporting(0);
 
$PRIMER_NOMBRE = $_POST['PRIMER_NOMBRE'];
$SEGUNDO_NOMBRE = $_POST['SEGUNDO_NOMBRE'];
$conexion->set_charset("utf8");

if(!empty($PRIMER_NOMBRE) AND empty($SEGUNDO_NOMBRE)){
	if ($result = $conexion->query("SELECT ID_CANDIDATO, CONCAT(PRIMER_NOMBRE, \" \", SEGUNDO_NOMBRE, \" \", PRIMER_APELLIDO, \" \", SEGUNDO_APELLIDO) AS NOMBRE, CURP FROM candidatos WHERE PRIMER_NOMBRE = '$PRIMER_NOMBRE' OR SEGUNDO_NOMBRE = '$PRIMER_NOMBRE' OR PRIMER_APELLIDO = '$PRIMER_NOMBRE' OR SEGUNDO_APELLIDO = '$PRIMER_NOMBRE'")) {

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT);
    	$result -> close();

    }
}
else if(!empty($PRIMER_NOMBRE) AND !empty($SEGUNDO_NOMBRE)){
	if ($result = $conexion->query("SELECT ID_CANDIDATO, CONCAT(PRIMER_NOMBRE, \" \", SEGUNDO_NOMBRE, \" \", PRIMER_APELLIDO, \" \", SEGUNDO_APELLIDO) AS NOMBRE, CURP FROM candidatos WHERE PRIMER_NOMBRE = '$PRIMER_NOMBRE' AND SEGUNDO_NOMBRE = '$SEGUNDO_NOMBRE'")) {

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT);
    	$result -> close();

    }
}

$conexion -> close();
?>