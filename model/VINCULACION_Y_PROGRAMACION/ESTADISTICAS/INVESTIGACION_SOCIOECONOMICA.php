<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 

$FECHA1 = $_REQUEST['FECHA1'];
$FECHA2 = $_REQUEST['FECHA2'];
$lol = $_REQUEST['lol'];

$conexion->set_charset("utf8");

	if($lol == "total" || $lol ==""){
		if ($result = $conexion->query("SELECT COUNT(*) AS cantidad FROM evaluacion EV WHERE EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2' AND EV.EVALUACION_DERIVADA_DE NOT LIKE '%_%'")) {

			while($row = $result->fetch_array(MYSQLI_ASSOC)) {
	            $myArray[] = $row;
	    	}
	    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
	    	$result -> close();
	    }
	}
	else{
		if ($result = $conexion->query("SELECT COUNT(*) AS cantidad 
			FROM evaluacion EV 
			LEFT JOIN candidatos CA ON CA.ID_CANDIDATO = EV.ID_CANDIDATO 
			LEFT JOIN oficios O ON O.ID_CANDIDATO = EV.ID_CANDIDATO AND O.ID_EVALUACION = EV.ID_EVALUACION 
			LEFT JOIN reporte_ise RIse ON RIse.ID_CANDIDATO = EV.ID_CANDIDATO AND RIse.ID_EVALUACION = EV.ID_EVALUACION 
			LEFT JOIN digiscan Digi ON Digi.ID_CANDIDATO = EV.ID_CANDIDATO AND Digi.ID_EVALUACION = EV.ID_EVALUACION 
			LEFT JOIN entrevista E_ise ON E_ise.ID_CANDIDATO = EV.ID_CANDIDATO AND E_ise.ID_EVALUACION = EV.ID_EVALUACION 
			LEFT JOIN historia_1 H ON O.ID_EVALUACION = H.ID_EVALUACION 
			LEFT JOIN historia_31 H2 ON O.ID_EVALUACION = H2.ID_EVALUACION 
			LEFT JOIN historia_5 H3 ON O.ID_EVALUACION = H3.ID_EVALUACION
			LEFT JOIN certificados Cert_ise ON Cert_ise.ID_EVALUACION = EV.ID_EVALUACION
			WHERE EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2' AND EV.EVALUACION_DERIVADA_DE NOT LIKE '%_%'".$lol)) {

			while($row = $result->fetch_array(MYSQLI_ASSOC)) {
	            $myArray[] = $row;
	    	}
	    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
	    	$result -> close();
	    }
	}
$conexion -> close();
?>