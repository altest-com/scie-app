<?php
header("Content-type: text/html; charset=utf8");
//header('Content-type:application/json');
require("../../conexion.php"); 

 
$ID_CANDIDATO = $_POST['ID_CANDIDATO'];

$conexion->set_charset("utf8");

$myArray = array();
if (empty($ID_CANDIDATO)) {

	print_r("Candidato no existe");
	
}
else{
	if ($result = $conexion->query("SELECT COUNT(*) FROM EVALUACION WHERE ID_CANDIDATO = '$ID_CANDIDATO'")) {

		$row = mysqli_fetch_array($result);


		print_r($row[0]);


	}
}


//$result -> close();
$conexion -> close();
?>