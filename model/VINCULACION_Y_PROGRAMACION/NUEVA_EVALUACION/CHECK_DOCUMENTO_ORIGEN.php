<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 

$FECHA_EVALUACION  = $_POST['FECHA_EVALUACION'];
$DOCUMENTO_ORIGEN = $_POST['DOCUMENTO_ORIGEN'];

$conexion->set_charset("utf8");
        

            
		if ($resultado = $conexion->query("SELECT evaluacion.* FROM `evaluacion`, candidatos WHERE FECHA_EVALUACION = '$FECHA_EVALUACION' AND candidatos.DOCUMENTO_ORIGEN = '$DOCUMENTO_ORIGEN'")) {

 			while($row = $resultado->fetch_array(MYSQLI_ASSOC)) {
            	$myArray[] = $row;
    		}
    		echo json_encode($myArray,JSON_PRETTY_PRINT);
            $resultado -> close();
    	}

        else{
            echo json_encode("Error",JSON_PRETTY_PRINT);


        }
     
$conexion -> close();
?>