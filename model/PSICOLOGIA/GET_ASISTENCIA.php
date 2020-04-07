<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../conexion.php"); 

$FECHA = $_POST['FECHA'];




$conexion->set_charset("utf8");

/* "SELECT CANDIDATOS.ID_CANDIDATO, ID_EVALUACION, CONCAT(PRIMER_NOMBRE, \" \", SEGUNDO_NOMBRE, \" \", PRIMER_APELLIDO, \" \", SEGUNDO_APELLIDO) AS NOMBRE, FROM CANDIDATOS JOIN EVALUACION ON(CANDIDATOS.ID_CANDIDATO = EVALUACION.ID_CANDIDATO) WHERE $PRUEBA = '$FECHA'"
*/
	if ($result = $conexion->query( "SELECT  candidatos.ID_CANDIDATO,  CONCAT(candidatos.PRIMER_NOMBRE, \" \", candidatos.SEGUNDO_NOMBRE, \" \", candidatos.PRIMER_APELLIDO, \" \", candidatos.SEGUNDO_APELLIDO) AS NOMBRE, evaluacion.ID_EVALUACION  FROM evaluacion LEFT JOIN candidatos ON(candidatos.ID_CANDIDATO = evaluacion.ID_CANDIDATO) WHERE FECHA_EXAMEN_PSICOLOGICO = '$FECHA'")) {

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	//echo print_r($myArray);
    	echo json_encode($myArray,JSON_UNESCAPED_UNICODE);
    	$result -> close();
    }

$conexion -> close();
?>