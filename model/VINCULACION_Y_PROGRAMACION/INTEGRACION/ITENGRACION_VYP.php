<?php
header("Content-type: text/html; charset=utf8");
require("../../conexion.php"); 

$ID_EVALUACION = $_POST['ID_EVALUACION'];



	$conexion->set_charset("utf8");

if ($result = $conexion->query(sprintf("SELECT MAX(resultado) AS RESULTADO,DEPARTAMENTO_ORIGEN FROM reportes WHERE ID_EVALUACION = \"%s\" ",$ID_EVALUACION))) {

		$row = mysqli_fetch_array($result);

		if($row[0] !== NULL){
			echo sprintf("%d %s", $row[0], $row[1]);


		
		}
		else{
			echo "false";
		}



	}




$conexion->close();


?>