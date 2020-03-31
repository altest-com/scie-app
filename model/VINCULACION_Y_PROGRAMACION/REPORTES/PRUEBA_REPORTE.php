<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 

 
$FECHAUNO = $_POST['FECHAUNO'];
$FECHADOS = $_POST['FECHADOS'];

$conexion->set_charset("utf8");



	if ($result = $conexion->query("SELECT candidatos.ID_CANDIDATO, CONCAT(PRIMER_NOMBRE, \" \", SEGUNDO_NOMBRE, \" \" ,PRIMER_APELLIDO,  \" \", SEGUNDO_APELLIDO) AS NOMBRE, CURP FROM candidatos JOIN evaluacion ON (candidatos.ID_CANDIDATO = evaluacion.ID_CANDIDATO) WHERE evaluacion.FECHA_EVALUACION BETWEEN '$FECHAUNO' AND '$FECHADOS'")) {

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT);
    	$result -> close();

    }


$conexion -> close();
?>