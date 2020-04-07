<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../conexion.php"); 
include_once "ConexionBD.php";

 
$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];


$conexion->set_charset("utf8");
	

	
	if ($result = $conexion->query("SELECT DEPENDENCIA, ADSCRIPCION, CORPORACION, PUESTO, FECHA, TIPO_EVALUACION, MOTIVO_EVALUACION FROM oficios O INNER JOIN evaluacion E ON E.ID_EVALUACION = O.ID_EVALUACION WHERE E.ID_EVALUACION = '$ID_EVALUACION'")) {

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    	$result -> close();

    }


$conexion -> close();
?>