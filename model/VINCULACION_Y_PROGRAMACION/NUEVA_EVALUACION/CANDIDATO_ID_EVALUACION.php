<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];

$conexion->set_charset("utf8");
        
            
		if ($resultado = $conexion->query("SELECT CONCAT(PRIMER_NOMBRE, \" \", SEGUNDO_NOMBRE, \" \", PRIMER_APELLIDO, \" \", SEGUNDO_APELLIDO) AS NOMBRE, CURP, ID_EVALUACION, FECHA_EVALUACION FROM candidatos JOIN evaluacion ON (candidatos.ID_CANDIDATO = evaluacion.ID_CANDIDATO) WHERE candidatos.ID_CANDIDATO = '$ID_CANDIDATO'")) {

 			while($row = $resultado->fetch_array(MYSQLI_ASSOC)) {
            	$myArray[] = $row;
    		}
    		echo json_encode($myArray,JSON_PRETTY_PRINT);
            $resultado -> close();
    	}
     

$conexion -> close();
?>
