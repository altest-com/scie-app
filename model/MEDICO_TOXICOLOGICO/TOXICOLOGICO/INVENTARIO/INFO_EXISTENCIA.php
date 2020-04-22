<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../../conexion.php"); 

$FECHA1 = $_POST['FECHA1'];
$FECHA2 = $_POST['FECHA2'];
$ID = $_POST['ID'];
$conexion->set_charset("utf8");


	if ($ID =="TODOS") {
		if ($result = $conexion->query("SELECT * FROM toxicologia_productos")) {

			while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            	$myArray[] = $row;
    		}
    		echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    		$result -> close();

    	}
	}
	else{
		if ($result = $conexion->query("SELECT * FROM toxicologia_productos_historial WHERE ID_PRODUCTO = '$ID' AND  FECHA BETWEEN '$FECHA1' AND '$FECHA2'")) {

			while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            	$myArray[] = $row;
    		}
    		echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    		$result -> close();

    	}
	}


$conexion -> close();
?>