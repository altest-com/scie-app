<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../../conexion.php"); 

$FECHA1 = $_POST['FECHA1']." 00:00:01";
$FECHA2 = $_POST['FECHA2']." 23:59:59";


$conexion->set_charset("utf8");



	if ($result = $conexion->query("SELECT * FROM medico_bitacora1 M1 INNER JOIN medico_bitacora2 M2 ON M1.ID_CANDIDATO = M2.ID_CANDIDATO AND M1.ID_EVALUACION = M2.ID_EVALUACION INNER JOIN medico_bitacora3 M3 ON M1.ID_CANDIDATO = M3.ID_CANDIDATO AND M1.ID_EVALUACION = M3.ID_EVALUACION INNER JOIN medico_clinica01 C01 ON M1.ID_CANDIDATO = C01.ID_CANDIDATO AND M1.ID_EVALUACION = C01.ID_EVALUACION INNER JOIN medico_clinica03 C03 ON M1.ID_CANDIDATO = C03.ID_CANDIDATO AND M1.ID_EVALUACION = C03.ID_EVALUACION INNER JOIN medico_clinica06 C06 ON M1.ID_CANDIDATO = C06.ID_CANDIDATO AND M1.ID_EVALUACION = C06.ID_EVALUACION INNER JOIN medico_clinica08 C08 ON M1.ID_CANDIDATO = C08.ID_CANDIDATO AND M1.ID_EVALUACION = C08.ID_EVALUACION INNER JOIN medico_clinica10 C10 ON M1.ID_CANDIDATO = C10.ID_CANDIDATO AND M1.ID_EVALUACION = C10.ID_EVALUACION INNER JOIN  evaluacion EV ON M1.ID_EVALUACION = EV.ID_EVALUACION WHERE EV.FECHA_EXAMEN_MEDICO BETWEEN '$FECHA1' AND '$FECHA2'")) {

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    	$result -> close();

    }


$conexion -> close();
?>