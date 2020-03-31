<?php
header("Content-Type: text/html;charset=utf-8");
include("conexion.php");
header('Content-type:application/json');


$conexion->set_charset("utf8");

	if ($result = $conexion->query("	SELECT CONCAT (candidatos.PRIMER_NOMBRE, " ", candidatos.SEGUNDO_NOMBRE, " ", candidatos.PRIMER_APELLIDO, " ", candidatos.SEGUNDO_APELLIDO) AS NOMBRE, evaluacion.*
			FROM candidatos INNER JOIN evaluacion ON (candidatos.ID_CANDIDATO = evaluacion.ID_CANDIDATO)
			WHERE evaluacion.AUTORIZACION IN ("00", "01")
			GROUP BY NOMBRE
			HAVING COUNT(*) > 1")) {

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    	$result -> close();
    }

$conexion -> close();
?>