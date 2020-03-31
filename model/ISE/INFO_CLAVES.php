<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../conexion.php"); 

$FECHA = $_POST['FECHA'];

$conexion->set_charset("utf8");



	if ($result = $conexion->query("SELECT * FROM ise_claves_local WHERE FECHA = '$FECHA'")) {

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    	$result -> close();

    }


$conexion -> close();
?>