<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 

$FECHA1 = $_REQUEST['FECHA1'];
$FECHA2 = $_REQUEST['FECHA2'];
$lol = $_REQUEST['lol'];


$conexion->set_charset("utf8");


	
		if ($result = $conexion->query("SELECT CA.PRIMER_NOMBRE, IF(CA.SEGUNDO_NOMBRE != '' OR CA.SEGUNDO_NOMBRE != ' ', CA.SEGUNDO_NOMBRE, '') AS 'SEGUNDO_NOMBRE',CA.PRIMER_APELLIDO, IF (CA.SEGUNDO_APELLIDO != '' OR CA.SEGUNDO_APELLIDO != ' ', CA.SEGUNDO_APELLIDO, '') AS SEGUNDO_APELLIDO,CA.CURP,EV.FOLIO,EV.FECHA_EVALUACION,EV.TIPO_EVALUACION,EV.MOTIVO_EVALUACION, EV.MODO_EVALUACION,EV.SOLICITANTE_DE_EVALUACION,EV.ORIGEN_DE_RECURSOS 
			FROM evaluacion EV 
			LEFT JOIN candidatos CA ON CA.ID_CANDIDATO = EV.ID_CANDIDATO 
			LEFT JOIN oficios O ON O.ID_CANDIDATO = EV.ID_CANDIDATO AND O.ID_EVALUACION = EV.ID_EVALUACION 
			LEFT JOIN psicologia_reporte PR ON PR.ID_CANDIDATO = EV.ID_CANDIDATO AND PR.ID_EVALUACION = EV.ID_EVALUACION 
			LEFT JOIN calificacion_psicologico CP ON CP.ID_CANDIDATO = EV.ID_CANDIDATO AND CP.ID_EVALUACION = EV.ID_EVALUACION 
			LEFT JOIN asistencia_entrevista_psicologia AE ON AE.ID_CANDIDATO = EV.ID_CANDIDATO AND AE.ID_EVALUACION = EV.ID_EVALUACION 
			WHERE EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2' AND EV.EVALUACION_DERIVADA_DE NOT LIKE '%_%'".$lol)) {

			while($row = $result->fetch_array(MYSQLI_ASSOC)) {
	            $myArray[] = $row;
	    	}
	    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
	    	$result -> close();

	    }
	


$conexion -> close();
?>