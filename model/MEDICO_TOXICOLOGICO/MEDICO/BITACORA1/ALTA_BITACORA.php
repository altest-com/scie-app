<?php
header("Content-type: text/html; charset=utf8");
require("../../../conexion.php");
include_once "../ConexionBD.php"; 

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$LEUCOCITOS = $_POST['LEUCOCITOS'];
$HEMOGLOBINA = $_POST['HEMOGLOBINA'];
$ERITROCITOS = $_POST['ERITROCITOS'];
$HEMATOCITOS = $_POST['HEMATOCITOS'];
$PLAQUETAS = $_POST['PLAQUETAS'];
$GRUPO_SANGUINEO = $_POST['GRUPO_SANGUINEO'];


/*"INSERT INTO ASISTENCIA VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$PRUEBA' ,'$FECHA', '$ASISTENCIA')"*/
		$cone = conectarBD();
		$lol = Verificar_bitacora1($cone,$ID_CANDIDATO, $ID_EVALUACION);
		echo $lol;
		$conexion->set_charset("utf8");

		if($lol=="correcto"){
			$sqlUpdate = "UPDATE medico_bitacora1 SET LEUCOCITOS = '$LEUCOCITOS', HEMOGLOBINA = '$HEMOGLOBINA', ERITROCITOS = '$ERITROCITOS', HEMATOCITOS = '$HEMATOCITOS', PLAQUETAS = '$PLAQUETAS', GRUPO_SANGUINEO = '$GRUPO_SANGUINEO' WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION ='$ID_EVALUACION'";
			if ($conexion->query($sqlUpdate) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
			
		}

		else{
			$sqlInsert = "INSERT INTO medico_bitacora1 VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$LEUCOCITOS','$HEMOGLOBINA' ,'$ERITROCITOS', '$HEMATOCITOS', '$PLAQUETAS', '$GRUPO_SANGUINEO')";

			if ($conexion->query($sqlInsert) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
		}
		

$conexion->close();

?>