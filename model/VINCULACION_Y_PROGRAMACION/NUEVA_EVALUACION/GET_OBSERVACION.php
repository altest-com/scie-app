<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 

$ID_EVALUACION = $_POST['ID_EVALUACION'];

$conexion->set_charset("utf8");
        
            
		if ($resultado = $conexion->query("SELECT * FROM `eval_observaciones` WHERE ID_EVALUACION ='$ID_EVALUACION'")) {

 			while($row = $resultado->fetch_array(MYSQLI_ASSOC)) {
            	$myArray[] = $row;
    		}
    		echo json_encode($myArray, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            $resultado -> close();
    	}
     

$conexion -> close();
?>
