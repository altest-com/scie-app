<?php

require("../conexion.php");
include_once "ConexionBD.php"; 

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$RESULTADO = $_POST['RESULTADO'];

/*"INSERT INTO ASISTENCIA VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$PRUEBA' ,'$FECHA', '$ASISTENCIA')"*/
		$cone = conectarBD();
		$lol = Verificar_psicometria($cone,$ID_CANDIDATO, $ID_EVALUACION);
		
		if($lol=="incorrecto"){
			
			$sqlInsert = "INSERT INTO psicometria VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$RESULTADO')";

			if ($conexion->query($sqlInsert) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
		}
		else{
			$sqlInsert = "UPDATE psicometria SET RESULTADO = '$RESULTADO' WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION = '$ID_EVALUACION'";

			if ($conexion->query($sqlInsert) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
		}
		
		

$conexion->close();

?>