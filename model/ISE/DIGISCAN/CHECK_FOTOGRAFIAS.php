<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 

$ID_EVALUACION = $_POST['ID_EVALUACION'];

$conexion->set_charset("utf8");
error_reporting(0);


		
	if ($result = $conexion->query("SELECT ARCHIVO FROM fotografias WHERE ID_EVALUACION = '$ID_EVALUACION' ")) {

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT);
    	$result -> close();

    }

	


$conexion -> close();
?>