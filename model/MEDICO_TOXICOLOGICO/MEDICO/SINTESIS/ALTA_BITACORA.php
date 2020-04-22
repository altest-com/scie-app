<?php
header("Content-type: text/html; charset=utf8");
require("../../../conexion.php");
include_once "../ConexionBD.php"; 

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$SINTESIS_TECNICA = $_POST['SINTESIS_TECNICA'];



/*"INSERT INTO ASISTENCIA VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$PRUEBA' ,'$FECHA', '$ASISTENCIA')"*/
		$cone = conectarBD();
		$lol = Verificar_sintesis($cone,$ID_CANDIDATO, $ID_EVALUACION);
		echo $lol;
		$conexion->set_charset("utf8");

		if($lol=="correcto"){
			$sqlUpdate = "UPDATE medico_sintesis SET SINTESIS_TECNICA = '$SINTESIS_TECNICA' WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION ='$ID_EVALUACION'";
			if ($conexion->query($sqlUpdate) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
			
		}

		else{
			$sqlInsert = "INSERT INTO medico_sintesis VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$SINTESIS_TECNICA')";

			if ($conexion->query($sqlInsert) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
		}
		

$conexion->close();

?>