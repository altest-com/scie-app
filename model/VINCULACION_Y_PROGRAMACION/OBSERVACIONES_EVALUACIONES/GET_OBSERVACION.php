<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../conexion.php"); 

$ID_EVALUACION = $_POST['ID_EVALUACION'];
$ID_EVALUADOR = $_POST['ID_EVALUADOR'];
$conexion->set_charset("utf8");



	if ($result = $conexion->query("SELECT * FROM observaciones_evaluadores WHERE ID_EVALUACION = '$ID_EVALUACION' AND ID_EVALUADOR = '$ID_EVALUADOR'")) {

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    	$result -> close();

    }


$conexion -> close();
?>