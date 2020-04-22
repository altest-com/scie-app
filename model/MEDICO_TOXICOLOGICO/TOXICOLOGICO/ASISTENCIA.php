<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 
include_once "../../ConexionBD.php";


error_reporting(0);
 

$conexion->set_charset("utf8");

	$time = time();
	$date2 = date("Y-m-d", $time);
	//$date =$date2." 09:00:00";
	$date ="2017-12-15 09:00:00";

		$myArray = array();
	if ($result = $conexion->query("SELECT C.ID, C.ID_CANDIDATO, C.PRIMER_NOMBRE, C.SEGUNDO_NOMBRE, C.PRIMER_APELLIDO, C.SEGUNDO_APELLIDO, C.CURP, C.DEPENDENCIA, C.CORPORACION, C.ADSCRIPCION, C.DOCUMENTO_ORIGEN, C.PUESTO, C.FOTOGRAFIA, EVALUACION.ID_EVALUACION FROM CANDIDATOS C LEFT JOIN EVALUACION ON C.ID_CANDIDATO = EVALUACION.ID_CANDIDATO WHERE FECHA_EXAMEN_TOXICOLOGICO = '$date'")) {
 		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
 			$candidato= $row['ID_CANDIDATO'];
 			$eval = $row['ID_EVALUACION'];
 			


 			$con = conectarBD();
 			$lol = Verificar_asistencia($con, $candidato,$eval,"2017-12-15");
			if ($lol=="correcto")
			{
				array_push($row, "Asistio");
			} else {
				array_push($row, "No Asistio");
			}
    		
    		$myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT);
    	$result -> close();

    }

$conexion -> close();
?>


