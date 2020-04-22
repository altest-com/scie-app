<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 

 
$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];


$conexion->set_charset("utf8");



	if ($result = $conexion->query("SELECT * FROM oficios O LEFT JOIN seguimiento_candidatos S ON O.ID_EVALUACION = S.ID_EVALUACION LEFT JOIN reportes R ON O.ID_EVALUACION = R.ID_EVALUACION LEFT JOIN toxicologico_bitacora1 T1 ON T1.ID_CANDIDATO = O.ID_CANDIDATO AND O.ID_EVALUACION = T1.ID_EVALUACION LEFT JOIN toxicologico_bitacora2 T2 ON O.ID_CANDIDATO  = T2.ID_CANDIDATO AND O.ID_EVALUACION = T2.ID_EVALUACION LEFT JOIN digiscan D on O.ID_CANDIDATO = D.ID_CANDIDATO AND O.ID_EVALUACION = D.ID_EVALUACION WHERE O.ID_CANDIDATO = '$ID_CANDIDATO' AND O.ID_EVALUACION = '$ID_EVALUACION' AND R.DEPARTAMENTO_ORIGEN = 'TOXICOLÓGICO'")) {

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    	$result -> close();

    }


$conexion -> close();
?>