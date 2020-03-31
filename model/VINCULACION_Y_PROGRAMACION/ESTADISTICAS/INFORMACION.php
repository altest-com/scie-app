<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 

$FECHA1 = $_REQUEST['FECHA1'];
$FECHA2 = $_REQUEST['FECHA2'];
$lol = $_REQUEST['lol'];

$conexion->set_charset("utf8");

	if($lol == "total" || $lol ==""){
		if ($result = $conexion->query("SELECT DISTINCT COUNT(*) AS cantidad FROM evaluacion E INNER JOIN concentrado_integracion C ON E.ID_EVALUACION = C.ID_EVALUACION WHERE C.FECHA_RI BETWEEN '$FECHA1' AND '$FECHA2' AND E.ID_EVALUACION NOT IN (SELECT EV.EVALUACION_DERIVADA_DE FROM evaluacion EV INNER JOIN concentrado_integracion CE ON EV.ID_EVALUACION = CE.ID_EVALUACION WHERE EV.EVALUACION_DERIVADA_DE LIKE '%_%' AND CE.FECHA_RI BETWEEN '$FECHA1' AND '$FECHA2') AND C.TIPO = '2' AND E.FOLIO!='' AND E.FOLIO!='-' AND E.FOLIO IS NOT NULL")) {

			while($row = $result->fetch_array(MYSQLI_ASSOC)) {
	            $myArray[] = $row;
	    	}
	    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
	    	$result -> close();
	    }
	}
	else{
		if ($result = $conexion->query("SELECT DISTINCT COUNT(*) AS cantidad 
			FROM evaluacion EV 
			INNER JOIN concentrado_integracion C ON EV.ID_EVALUACION = C.ID_EVALUACION
			LEFT JOIN reportes R ON R.ID_EVALUACION = EV.ID_EVALUACION  
			LEFT JOIN candidatos CA ON CA.ID_CANDIDATO = EV.ID_CANDIDATO 
			LEFT JOIN oficios O ON O.ID_EVALUACION = EV.ID_EVALUACION 
			LEFT JOIN reporte_integracion RIn ON RIn.ID_EVALUACION = EV.ID_EVALUACION 
			LEFT JOIN reporte_ise RIse ON RIse.ID_EVALUACION = EV.ID_EVALUACION
			LEFT JOIN reportes_med RMed ON RMed.ID_EVALUACION = EV.ID_EVALUACION
			LEFT JOIN reportes RTox ON RTox.ID_EVALUACION = EV.ID_EVALUACION
			LEFT JOIN psicologia_reporte RPsi ON RPsi.ID_EVALUACION = EV.ID_EVALUACION
			LEFT JOIN reporte_poligrafia RPol ON RPol.ID_EVALUACION = EV.ID_EVALUACION
			WHERE C.FECHA_RI BETWEEN '$FECHA1' AND '$FECHA2' AND EV.ID_EVALUACION NOT IN (SELECT EV.EVALUACION_DERIVADA_DE FROM evaluacion EV INNER JOIN concentrado_informacion_resultados CE ON EV.ID_EVALUACION = CE.ID_EVALUACION WHERE EV.EVALUACION_DERIVADA_DE LIKE '%_%' AND CE.EMISION BETWEEN '$FECHA1' AND '$FECHA2') AND C.TIPO = '2' AND EV.FOLIO!='' AND EV.FOLIO!='-' AND EV.FOLIO IS NOT NULL".$lol)) {

			while($row = $result->fetch_array(MYSQLI_ASSOC)) {
	            $myArray[] = $row;
	    	}
	    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
	    	$result -> close();
	    }
	}


$conexion -> close();
?>