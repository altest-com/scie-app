<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 


error_reporting(0);
 
$CURP = $_POST['CURP'];
$PRIMER_NOMBRE = $_POST['PRIMER_NOMBRE'];
$SEGUNDO_NOMBRE = $_POST['SEGUNDO_NOMBRE'];

$conexion->set_charset("utf8");

if(empty($CURP) AND empty($PRIMER_NOMBRE) AND empty($SEGUNDO_NOMBRE)){

	print_r("Sin datos");
}


else if (!empty($PRIMER_NOMBRE) AND !empty($SEGUNDO_NOMBRE)) {

	$myArray = array();

	if ($result = $conexion->query("SELECT * FROM CANDIDATOS WHERE (PRIMER_NOMBRE = '$PRIMER_NOMBRE' AND SEGUNDO_NOMBRE = '$SEGUNDO_NOMBRE') OR (PRIMER_APELLIDO = '$PRIMER_NOMBRE' AND SEGUNDO_APELLIDO = '$SEGUNDO_NOMBRE') OR (PRIMER_NOMBRE = '$PRIMER_NOMBRE' AND PRIMER_APELLIDO = '$SEGUNDO_NOMBRE') OR (PRIMER_NOMBRE = '$PRIMER_NOMBRE' AND SEGUNDO_APELLIDO = '$SEGUNDO_NOMBRE')")) {
 		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    	$result -> close();
	}
    //echo "nombres llenos";

}
else if(empty($CURP) AND !empty($PRIMER_NOMBRE) AND empty($SEGUNDO_NOMBRE)){
	$myArray = array();
	if ($result = $conexion->query("SELECT * FROM CANDIDATOS WHERE PRIMER_NOMBRE = '$PRIMER_NOMBRE' OR SEGUNDO_NOMBRE = '$PRIMER_NOMBRE' OR PRIMER_APELLIDO = '$PRIMER_NOMBRE' OR SEGUNDO_APELLIDO = '$PRIMER_NOMBRE'")) {
 		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    	$result -> close();
	}
    //echo "solo primer nombre";
}

else{

		$myArray = array();
	if ($result = $conexion->query("SELECT * FROM CANDIDATOS WHERE  CURP = '$CURP' ")) {
 		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    	$result -> close();

    }
    //echo "solo curp";

}
$conexion -> close();
?>


