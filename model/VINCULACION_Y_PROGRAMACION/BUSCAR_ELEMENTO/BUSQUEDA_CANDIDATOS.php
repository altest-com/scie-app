<?php
header("Content-type: text/html; charset=utf8");
//header('Content-type:application/json');
require("../../conexion.php"); 

 
$CURP = $_POST['CURP'];
$conexion->set_charset("utf8");

$myArray = array();
if (empty($CURP)) {

	print_r("sin curp");
	
}
else{
	if ($result = $conexion->query("SELECT COUNT(*) FROM EVALUACION WHERE ID_CANDIDATO = (SELECT ID_CANDIDATO FROM CANDIDATOS WHERE CURP = '$CURP' ) ")) {

		$row = mysqli_fetch_array($result);


		print_r($row[0]);


	}
}


//$result -> close();
$conexion -> close();
?>