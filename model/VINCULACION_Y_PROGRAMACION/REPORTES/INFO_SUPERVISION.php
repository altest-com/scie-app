<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 

$ID_EVALUACION = $_POST['ID_EVALUACION'];
$DEPARTAMENTO_ORIGEN = $_POST['DEPARTAMENTO'];
error_reporting(0);


if($DEPARTAMENTO_ORIGEN == 1) {
	$DEPARTAMENTO_ORIGEN = "POLIGRAFÍA";
}
else if($DEPARTAMENTO_ORIGEN == 2){
	$DEPARTAMENTO_ORIGEN = "PSICOLOGÍA";
}
else if($DEPARTAMENTO_ORIGEN == 3){
	$DEPARTAMENTO_ORIGEN = "INVESTIGACIÓN SOCIOECONOMICO";
}
else if($DEPARTAMENTO_ORIGEN == 4){
	$DEPARTAMENTO_ORIGEN = "MÉDICO";
}

else if($DEPARTAMENTO_ORIGEN == 5){
	$DEPARTAMENTO_ORIGEN = "TOXICOLÓGICO";
}
else if($DEPARTAMENTO_ORIGEN == 6){
	$DEPARTAMENTO_ORIGEN = "INTEGRACIÓN";
}


$conexion->set_charset("utf8");

	if ($result = $conexion->query("SELECT * FROM supervision_reporte WHERE ID_EVALUACION = '$ID_EVALUACION'  AND DEPARTAMENTO = '$DEPARTAMENTO_ORIGEN'")) {

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    	$result -> close();
    }

$conexion -> close();
?>