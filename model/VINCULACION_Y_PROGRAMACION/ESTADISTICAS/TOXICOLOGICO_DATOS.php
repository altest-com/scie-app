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
		LEFT JOIN toxicologico_bitacora1 T1 ON T1.ID_CANDIDATO = EV.ID_CANDIDATO AND T1.ID_EVALUACION = EV.ID_EVALUACION 
		LEFT JOIN toxicologico_bitacora2 T2 ON EV.ID_CANDIDATO = T2.ID_CANDIDATO AND EV.ID_EVALUACION = T2.ID_EVALUACION 
		LEFT JOIN toxicologico_bitacora4 T4 ON EV.ID_CANDIDATO = T4.ID_CANDIDATO AND EV.ID_EVALUACION = T4.ID_EVALUACION 
		LEFT JOIN medico_bitacora1 T5 ON EV.ID_CANDIDATO = T5.ID_CANDIDATO AND EV.ID_EVALUACION = T5.ID_EVALUACION 
		LEFT JOIN medico_bitacora2 T6 ON EV.ID_CANDIDATO = T6.ID_CANDIDATO AND EV.ID_EVALUACION = T6.ID_EVALUACION 
		LEFT JOIN medico_bitacora3 T7 ON EV.ID_CANDIDATO = T7.ID_CANDIDATO AND EV.ID_EVALUACION = T7.ID_EVALUACION 
		WHERE EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2' AND EV.EVALUACION_DERIVADA_DE NOT LIKE '%_%'".$lol)) {



		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    	$result -> close();

    }


$conexion -> close();
?>