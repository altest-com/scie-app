<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 

$ANO = $_REQUEST['ANO'];
$MES = $_REQUEST['MES'];
$lol = $_REQUEST['lol'];

$conexion->set_charset("utf8");


	if($lol == "total" || $lol ==""){
		if ($result = $conexion->query("SELECT DISTINCT I.ID_CANDIDATO,EV.*,O.*,CA.*  FROM inasistencias_mensuales I LEFT JOIN evaluacion EV ON I.ID_EVALUACION = EV.ID_EVALUACION LEFT JOIN oficios O ON I.ID_EVALUACION = O.ID_EVALUACION LEFT JOIN candidatos CA ON CA.ID_CANDIDATO = I.ID_CANDIDATO WHERE YEAR(I.FECHA) = '$ANO' AND MONTH(I.FECHA) = '$MES'")) {

			while($row = $result->fetch_array(MYSQLI_ASSOC)) {
	            $myArray[] = $row;
	    	}
	    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
	    	$result -> close();
	    }
	}
	else{
		if ($result = $conexion->query("SELECT DISTINCT I.ID_CANDIDATO,EV.*,O.*,CA.*  FROM inasistencias_mensuales I LEFT JOIN evaluacion EV ON I.ID_EVALUACION = EV.ID_EVALUACION LEFT JOIN oficios O ON I.ID_EVALUACION = O.ID_EVALUACION LEFT JOIN candidatos CA ON CA.ID_CANDIDATO = I.ID_CANDIDATO WHERE YEAR(I.FECHA) = '$ANO' AND MONTH(I.FECHA) = '$MES'".$lol)) {

			while($row = $result->fetch_array(MYSQLI_ASSOC)) {
	            $myArray[] = $row;
	    	}
	    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
	    	$result -> close();
	    }
	}

$conexion -> close();
?>