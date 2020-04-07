<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../conexion.php"); 
include_once "ConexionBD.php";

 
$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];


$conexion->set_charset("utf8");
	

	
	if ($result = $conexion->query("SELECT * FROM oficios O LEFT JOIN historia_5 M ON O.ID_EVALUACION = M.ID_EVALUACION LEFT JOIN psicologia_reporte P ON O.ID_CANDIDATO = P.ID_CANDIDATO AND O.ID_EVALUACION = P.ID_EVALUACION LEFT JOIN calificacion_psicologico CP ON CP.ID_EVALUACION = O.ID_EVALUACION WHERE O.ID_CANDIDATO = '$ID_CANDIDATO' AND O.ID_EVALUACION = '$ID_EVALUACION'")) {

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    	$result -> close();

    }


$conexion -> close();
?>