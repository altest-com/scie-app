<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");

//error_reporting(0);

$ID_EVALUACION = $_POST['ID_EVALUACION'];
$FECHA_EVALUACION = $_POST['FECHA_EVALUACION']; 
$NOMBRE = $_POST['NOMBRE'];
$CURP = $_POST['CURP'];
$EVAL = $_POST['PRUEBA'];
$FECHA_E = $_POST['FECHA_E'];


//VERIFICA SI YA HAY UN REGISTRO EXISTENTE

$sqlExist = mysqli_query($conexion,"SELECT * FROM seguimiento_candidatos WHERE ID_EVALUACION = '$ID_EVALUACION' AND CURP = '$CURP' ");
$row=mysqli_fetch_array($sqlExist);

 if($row[0] === NULL) {  

//LA NUMERACION QUE SE UTILIZA ACONTINUACION PERTENECE A LA NUMERACION DEL ARCHIVO CONSTANTES.CS DE PRUEBAS
if($EVAL == 2){
	$EVALUACION = "ISE_E";
}
else if($EVAL == 3){
	$EVALUACION = "MED_E";
}

else if($EVAL == 4){
	$EVALUACION = "TOX_E";
}

else if($EVAL == 5){
	$EVALUACION = "PSI_E";
}
else if($EVAL == 6){
	$EVALUACION = "POL_E";
}

			$sql = ("INSERT INTO seguimiento_candidatos VALUES ('$ID_EVALUACION' , '$FECHA_EVALUACION','$NOMBRE', '$CURP',  NULL,  NULL,  NULL,  NULL,  NULL,  NULL,  NULL, NULL,  NULL, NULL)");
				$conexion->set_charset("utf8");
				if ($conexion->query($sql) === TRUE ) {

				$sqlUpdate = ("UPDATE seguimiento_candidatos SET $EVALUACION  = '$FECHA_E' WHERE seguimiento_candidatos.ID_EVALUACION = '$ID_EVALUACION' AND seguimiento_candidatos.CURP = '$CURP'");
				$conexion->set_charset("utf8");
					if ($conexion->query($sqlUpdate) === TRUE ) {
			   	 		echo "true";
			   	 
					} else {
			    		echo "false";
			  		}
			   	 	echo "true";
				} else {
			    	echo "false";
			  }
 	}

 	else{


		//LA NUMERACION QUE SE UTILIZA ACONTINUACION PERTENECE A LA NUMERACION DEL ARCHIVO CONSTANTES.CS DE PRUEBAS
		if($EVAL == 2){
			$EVALUACION = "ISE_E";
		}
		else if($EVAL == 3){
			$EVALUACION = "MED_E";
		}

		else if($EVAL == 4){
			$EVALUACION = "TOX_E";
		}

		else if($EVAL == 5){
			$EVALUACION = "PSI_E";
		}
		else if($EVAL == 6){
			$EVALUACION = "POL_E";
		}

			$sql = ("UPDATE seguimiento_candidatos SET $EVALUACION  = '$FECHA_E' WHERE seguimiento_candidatos.ID_EVALUACION = '$ID_EVALUACION' AND seguimiento_candidatos.CURP = '$CURP'");
				$conexion->set_charset("utf8");
				if ($conexion->query($sql) === TRUE ) {
			   	 	echo "true";
			   	 
				} else {
			    	echo "false";
			  }

 	}


$conexion->close();

?>