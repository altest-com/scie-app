<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 

 
$FECHA = $_POST['FECHA'];

$conexion->set_charset("utf8");


	if ($result = $conexion->query("SELECT seguimiento_candidatos.FECHA_EVALUACION, evaluacion.FOLIO, NOMBRE, CURP, 
		IF(ISE_E IS NULL, '-', ISE_E) AS ISE_E, IF(ISE_S IS NULL, '-', ISE_S) AS ISE_S, 
		IF(MED_E IS NULL, '-', MED_E) AS MED_E, IF(MED_S IS NULL, '-', MED_S) AS MED_S, 
		IF(TOX_E IS NULL, '-', TOX_E) AS TOX_E, IF(TOX_S IS NULL, '-', TOX_S) AS TOX_S, 
		IF(POL_E IS NULL, '-', POL_E) AS POL_E, IF(POL_S IS NULL, '-', POL_S) AS POL_S, 
		IF(PSI_E IS NULL, '-', PSI_E) AS PSI_E, IF(PSI_S IS NULL, '-', PSI_S) AS PSI_S,
		MUESTRA_TOX, MUESTRA_MED
		FROM seguimiento_candidatos INNER JOIN evaluacion ON (seguimiento_candidatos.ID_EVALUACION = evaluacion.ID_EVALUACION) 
		WHERE ISE_E LIKE '%$FECHA%' 
		OR MED_E LIKE '%$FECHA%' 
		OR TOX_E LIKE '%$FECHA%' 
		OR POL_E LIKE '%$FECHA%' 
		OR PSI_E LIKE '%$FECHA%' ")) {

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    	$result -> close();

    }


$conexion -> close();
?>