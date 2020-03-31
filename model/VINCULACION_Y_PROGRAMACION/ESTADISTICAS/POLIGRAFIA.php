<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 

$FECHA1 = $_REQUEST['FECHA1'];
$FECHA2 = $_REQUEST['FECHA2'];
$lol = $_REQUEST['lol'];

$conexion->set_charset("utf8");

	if($lol == "total" || $lol ==""){
		if ($result = $conexion->query("SELECT COUNT(*) AS cantidad FROM evaluacion EV WHERE EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'")) {

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
			LEFT JOIN oficios O ON O.ID_EVALUACION = EV.ID_EVALUACION 
			LEFT JOIN calificacion CPoli ON CPoli.ID_EVALUACION = EV.ID_EVALUACION 
			LEFT JOIN reporte_poligrafia R ON R.ID_EVALUACION = EV.ID_EVALUACION 
			WHERE EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'".$lol)) {

			while($row = $result->fetch_array(MYSQLI_ASSOC)) {
	            $myArray[] = $row;
	    	}
	    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
	    	$result -> close();
	    }
	}

$conexion -> close();
?>