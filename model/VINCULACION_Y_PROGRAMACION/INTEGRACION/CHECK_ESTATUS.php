<?php
header("Content-type: text/html; charset=utf8");
require("../../conexion.php"); 

$ID_EVALUACION = $_POST['ID_EVALUACION'];
$PRUEBA = $_POST['PRUEBA'];

$conexion->set_charset("utf8");

//echo sprintf("%d", $EVAL);

if($PRUEBA == 1) {
	$PRUEBA = 'VYP';
}
else if($PRUEBA == 2){
	$PRUEBA = 'ISE';
}
else if($PRUEBA == 3){
	$PRUEBA = 'MEDICO';
}
else if($PRUEBA == 4){
	$PRUEBA = 'TOX';
}
else if($PRUEBA == 5){
	$PRUEBA = 'PSICO';
}
else if($PRUEBA == 6){
	 $PRUEBA = 'POLI';
}
else if($PRUEBA == 7){
	 $PRUEBA = 'INTEG';
}

//echo $PRUEBA,$EVAL;

if ($result = $conexion->query(sprintf("SELECT NOMBRE, %s FROM integracion WHERE ID_EVALUACION = \"%s\"",$PRUEBA,$ID_EVALUACION))) {

	
		$row = mysqli_fetch_array($result);
		//echo sprintf("%d %s",$row[0],$row[1]);

		if($row[0] !== NULL){
			echo sprintf(" %s",$row[1]);
		
		}
		else{
			echo "false";
		}



	}


$conexion->close();


?>