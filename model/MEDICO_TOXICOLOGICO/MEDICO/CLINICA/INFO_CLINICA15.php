<?php
header("Content-type: text/html; charset=utf8mb4");
header('Content-type:application/json');
require("../../../conexion.php"); 

 
$ID_CANDIDATO = $_REQUEST['ID_CANDIDATO'];
$ID_EVALUACION = $_REQUEST['ID_EVALUACION'];


$conexion->set_charset("utf8");



	if ($result = $conexion->query("SELECT * FROM medico_clinica15 WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION = '$ID_EVALUACION'")) {

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_SLASHES);
    	$result -> close();

    }


$conexion -> close();
?>