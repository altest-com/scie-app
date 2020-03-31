<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 

 
$ID_CANDIDATO = $_POST['ID_CANDIDATO'];

$conexion->set_charset("utf8");



	if ($result = $conexion->query("SELECT * FROM CANDIDATOS WHERE ID_CANDIDATO = '$ID_CANDIDATO'")) {

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE );
    	$result -> close();

    }


$conexion -> close();
?>