<?php
header("Content-type: text/html; charset=utf8");
header('Content-Type: text/html; charset=utf-8');
header('Content-type:application/json');
require("../../conexion.php"); 

 
$ID_EVALUACION = $_POST['ID_EVALUACION'];

$conexion->set_charset("utf8");



	if ($result = $conexion->query("SELECT * FROM ALERTA_DE_RIESGO WHERE ID_EVALUACION = '$ID_EVALUACION'")) {

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    	$result -> close();

    }
   	


$conexion -> close();
?>