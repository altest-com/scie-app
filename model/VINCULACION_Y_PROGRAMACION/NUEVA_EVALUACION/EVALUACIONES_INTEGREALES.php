<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 


error_reporting(0);
 
$ID_CANDIDATO = $_POST['ID_CANDIDATO'];

$conexion->set_charset("utf8");


	if (($result = $conexion->query("SELECT COUNT(*) FROM evaluacion WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND MODO_EVALUACION = 'INTEGRAL'")) > 0) {
    	$result -> close();

		if ($resultado = $conexion->query("SELECT * FROM evaluacion WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND MODO_EVALUACION = 'INTEGRAL'")) {
 			while($row = $resultado->fetch_array(MYSQLI_ASSOC)) {
            	$myArray[] = $row;
    		}
    		echo json_encode($myArray,JSON_PRETTY_PRINT);
    		$resultado -> close();
    	}
    }
    else{
    		 $varjson = "hola:YO";
    		 echo json_encode(JSON_PRETTY_PRINT);

    }


$conexion -> close();
?>
