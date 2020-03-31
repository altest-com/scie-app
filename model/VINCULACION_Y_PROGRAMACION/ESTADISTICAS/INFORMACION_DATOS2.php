<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 

$FECHA1 = $_REQUEST['FECHA1'];
$FECHA2 = $_REQUEST['FECHA2'];
$lol = $_REQUEST['lol'];

$conexion->set_charset("utf8");



	if ($result = $conexion->query("SELECT DISTINCT CA.PRIMER_NOMBRE, IF(CA.SEGUNDO_NOMBRE != '' OR CA.SEGUNDO_NOMBRE != ' ', CA.SEGUNDO_NOMBRE, '') AS 'SEGUNDO_NOMBRE',CA.PRIMER_APELLIDO, IF (CA.SEGUNDO_APELLIDO != '' OR CA.SEGUNDO_APELLIDO != ' ', CA.SEGUNDO_APELLIDO, '') AS SEGUNDO_APELLIDO,
		CI.CURP,
		EV.FOLIO,
		CI.RFC,
		CI.TOX,
		EV.TIPO_EVALUACION,EV.MOTIVO_EVALUACION, O.DEPENDENCIA,O.PUESTO,O.CORPORACION ,EV.EVALUACION_DERIVADA_DE,
		CI.INTEGRACION,
		CI.PRESICION_PUESTO,
		CI.INTEGRACION_R
		FROM evaluacion EV 
		LEFT JOIN candidatos CA ON CA.ID_CANDIDATO = EV.ID_CANDIDATO 
		LEFT JOIN oficios O ON O.ID_EVALUACION = EV.ID_EVALUACION 
		LEFT JOIN concentrado_informacion_resultados CI ON CI.ID_EVALUACION = EV.ID_EVALUACION  
		WHERE CI.EMISION BETWEEN '$FECHA1' AND '$FECHA2' AND EV.ID_EVALUACION NOT IN (SELECT EV1.EVALUACION_DERIVADA_DE FROM evaluacion EV1 WHERE EV1.EVALUACION_DERIVADA_DE LIKE '%_%' AND EV1.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2')".$lol)) {

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    	$result -> close();

    }


$conexion -> close();
?>