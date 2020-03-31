<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 

$ID_EVALUACION = $_POST['ID_EVALUACION'];

$conexion->set_charset("utf8");



	if ($result = $conexion->query("SELECT E.ID_EVALUACION, R.RESULTADO FROM EVALUACION E LEFT JOIN REPORTE_POLIGRAFIA R ON R.ID_EVALUACION = E.ID_EVALUACION WHERE E.EVALUACION_DERIVADA_DE = '$ID_EVALUACION'")) {

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    	$result -> close();

    }


$conexion -> close();
?>