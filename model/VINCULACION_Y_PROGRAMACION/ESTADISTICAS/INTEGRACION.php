<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 

$FECHA1 = $_REQUEST['FECHA1'];
$FECHA2 = $_REQUEST['FECHA2'];
$lol = $_REQUEST['lol'];

$conexion->set_charset("utf8");


	if($lol == "total" || $lol ==""){
		if ($result = $conexion->query("SELECT COUNT(*) AS cantidad FROM evaluacion EV WHERE EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2' AND ID_EVALUACION NOT IN (SELECT EVALUACION_DERIVADA_DE FROM evaluacion WHERE EVALUACION_DERIVADA_DE LIKE '%_%' AND FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2')")) {

			while($row = $result->fetch_array(MYSQLI_ASSOC)) {
	            $myArray[] = $row;
	    	}
	    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
	    	$result -> close();
	    }
	}
	else{
		if ($result = $conexion->query("SELECT COUNT(*) AS cantidad FROM evaluacion EV 
			LEFT JOIN candidatos CA ON CA.ID_CANDIDATO = EV.ID_CANDIDATO 
			LEFT JOIN oficios O ON O.ID_CANDIDATO = EV.ID_CANDIDATO AND O.ID_EVALUACION = EV.ID_EVALUACION 
			LEFT JOIN concentrado_integracion CI ON CI.ID_EVALUACION = EV.ID_EVALUACION 
			LEFT JOIN evaluador_evaluacion EE ON EV.ID_EVALUACION = EE.ID_EVALUACION 
			LEFT JOIN reporte_integracion RIn ON RIn.ID_CANDIDATO = EV.ID_CANDIDATO AND RIn.ID_EVALUACION = EV.ID_EVALUACION 
			LEFT JOIN candidatos_no_evaluables CNE ON CNE.ID_CANDIDATO = CA.ID_CANDIDATO 
			WHERE EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2' AND EV.ID_EVALUACION NOT IN (SELECT EVALUACION_DERIVADA_DE FROM evaluacion WHERE EVALUACION_DERIVADA_DE LIKE '%_%' AND FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2')".$lol)) {

			while($row = $result->fetch_array(MYSQLI_ASSOC)) {
	            $myArray[] = $row;
	    	}
	    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
	    	$result -> close();
	    }
	}
	


$conexion -> close();
?>