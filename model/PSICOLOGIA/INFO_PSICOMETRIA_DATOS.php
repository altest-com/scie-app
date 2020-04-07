<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../conexion.php"); 

 
$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];


$conexion->set_charset("utf8");



	if ($result = $conexion->query("SELECT H2.ESTUDIOS AS ULTIMO_GRADO_ESTUDIOS ,H.RFC,O.PUESTO, O.DEPENDENCIA FROM oficios O LEFT JOIN historia_1 H ON H.ID_EVALUACION = O.ID_EVALUACION LEFT JOIN historia_5 H2 ON H2.ID_EVALUACION = O.ID_EVALUACION WHERE O.ID_EVALUACION = '$ID_EVALUACION'")) {

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    	$result -> close();

    }


$conexion -> close();
?>