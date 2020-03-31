<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 

 
$ID_EVALUACION = $_POST['ID_EVALUACION'];

$conexion->set_charset("utf8");



	if ($result = $conexion->query("SELECT candidatos.ID_CANDIDATO, CONCAT(PRIMER_NOMBRE, \" \", SEGUNDO_NOMBRE, \" \" ,PRIMER_APELLIDO,  \" \", SEGUNDO_APELLIDO) AS NOMBRE, FECHA_EXAMEN_TOXICOLOGICO, FECHA_EXAMEN_MEDICO, FECHA_EXAMEN_PSICOLOGICO, FECHA_EXAMEN_POLIGRAFICO, FECHA_ISE_DOCUMENTOS, FECHA_ISE_ENTREVISTA FROM candidatos JOIN evaluacion ON (candidatos.ID_CANDIDATO = evaluacion.ID_CANDIDATO) WHERE evaluacion.ID_EVALUACION = '$ID_EVALUACION'")) {

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT);
    	$result -> close();

    }


$conexion -> close();
?>