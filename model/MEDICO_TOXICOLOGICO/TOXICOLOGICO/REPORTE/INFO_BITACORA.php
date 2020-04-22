<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../../conexion.php"); 

$FECHA1 = $_POST['FECHA1']." 00:00:01";
$FECHA2 = $_POST['FECHA2']." 23:59:59";


$conexion->set_charset("utf8");



	if ($result = $conexion->query("SELECT * FROM toxicologico_bitacora1 T1 INNER JOIN toxicologico_bitacora2 T2 ON T1.ID_CANDIDATO = T2.ID_CANDIDATO AND T1.ID_EVALUACION = T2.ID_EVALUACION INNER JOIN toxicologico_bitacora3 T3 ON T1.ID_CANDIDATO = T3.ID_CANDIDATO AND T1.ID_EVALUACION = T3.ID_EVALUACION INNER JOIN toxicologico_bitacora4 T4 ON T1.ID_CANDIDATO = T4.ID_CANDIDATO AND T1.ID_EVALUACION = T4.ID_EVALUACION INNER JOIN evaluacion EV ON T1.ID_EVALUACION = EV.ID_EVALUACION WHERE EV.FECHA_EXAMEN_TOXICOLOGICO BETWEEN '$FECHA1' AND '$FECHA2'")) {

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    	$result -> close();

    }


$conexion -> close();
?>