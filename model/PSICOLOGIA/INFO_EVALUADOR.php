<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../conexion.php"); 

 
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$DEPARTAMENTO = $_POST['DEPARTAMENTO'];


$conexion->set_charset("utf8");



	if ($result = $conexion->query("SELECT * FROM evaluador_evaluacion A INNER JOIN evaluadores B ON A.ID_EVALUADOR = B.ID_EVALUADOR WHERE A.ID_EVALUACION = '$ID_EVALUACION' AND A.DEPARTAMENTO = '$DEPARTAMENTO'")) {

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    	$result -> close();

    }


$conexion -> close();
?>