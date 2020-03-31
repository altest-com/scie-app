<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 
include_once "ConexionBD.php";

$CURP = $_POST['CURP'];
$ID = $_POST['ID'];
$cone = conectarBD();
$ID_CANDIDATO = Consultar_ID_CANDIDATO($cone,$CURP);

$conexion->set_charset("utf8");

if($ID==""){

	if ($result = $conexion->query("SELECT * FROM evaluacion E LEFT JOIN oficios O ON E.ID_EVALUACION = O.ID_EVALUACION LEFT JOIN candidatos C ON O.ID_CANDIDATO = C.ID_CANDIDATO WHERE E.ID_CANDIDATO = '$ID_CANDIDATO' AND E.FOLIO LIKE '%-%' ORDER BY E.FOLIO DESC LIMIT 1")) {

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    	$result -> close();

    }
}
else{
	if ($result = $conexion->query("SELECT * FROM evaluacion E LEFT JOIN oficios O ON E.ID_EVALUACION = O.ID_EVALUACION LEFT JOIN candidatos C ON O.ID_CANDIDATO = C.ID_CANDIDATO LEFT JOIN vinculacion_curps_ext V ON C.CURP = V.CURP WHERE E.ID_CANDIDATO = '$ID_CANDIDATO' AND V.ID ='$ID' ORDER BY E.FECHA_EVALUACION DESC LIMIT 1")) {

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    	$result -> close();

    }
}


$conexion -> close();
?>