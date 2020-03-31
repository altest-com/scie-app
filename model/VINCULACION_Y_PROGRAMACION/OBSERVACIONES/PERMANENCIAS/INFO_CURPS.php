<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 

$conexion->set_charset("utf8");

$PAGE = $_POST['PAGE'];

	if ($result = $conexion->query("SELECT V.DEPENDENCIA2, V.CORPORACION2, V.ADSCRIPCION2, V.PUESTO2, V.PROCESO, V.ESTATUS, V.ID, V.ID_EVALUACION, O.DEPENDENCIA, O.CORPORACION FROM vinculacion_curps V LEFT JOIN oficios O ON V.ID_EVALUACION = O.ID_EVALUACION ORDER BY V.ID ASC LIMIT $PAGE,100")) {

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    	$result -> close();

    }


$conexion -> close();
?>