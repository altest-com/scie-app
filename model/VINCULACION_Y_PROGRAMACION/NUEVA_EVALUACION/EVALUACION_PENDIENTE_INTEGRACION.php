<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 

$conexion->set_charset("utf8");

if ($result = $conexion->query("SELECT CONCAT(PRIMER_NOMBRE,' ',SEGUNDO_NOMBRE,' ',PRIMER_APELLIDO,' ',SEGUNDO_APELLIDO) AS NOMBRE,candidatos.CURP, evaluacion.* FROM candidatos INNER JOIN evaluacion ON (candidatos.ID_CANDIDATO = evaluacion.ID_CANDIDATO ) WHERE evaluacion.AUTORIZACION = '100'")){


		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $jArray[] = $row;
    	}
    	echo json_encode($jArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    	$result -> close();
    }

$conexion -> close();
?>

