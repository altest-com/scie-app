<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 

 
$ID_CANDIDATO = $_POST['ID_CANDIDATO'];


$conexion->set_charset("utf8");



	if ($result = $conexion->query("SELECT * FROM oficios O INNER JOIN evaluacion E ON E.ID_EVALUACION = O.ID_EVALUACION WHERE O.ID_CANDIDATO = '$ID_CANDIDATO'")) {

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    	$result -> close();

    }


$conexion -> close();
?>