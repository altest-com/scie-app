<?php
header("Content-type: text/html; charset=utf8");
require("../../../conexion.php");
include_once "../ConexionBD.php"; 

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$GLUCOSA = $_POST['GLUCOSA'];
$UREA = $_POST['UREA'];
$CREATININA = $_POST['CREATININA'];
$ACIDO_URICO = $_POST['ACIDO_URICO'];
$COLESTEROL = $_POST['COLESTEROL'];
$TRIGLICERIDOS = $_POST['TRIGLICERIDOS'];
$COLESTEROL1 = $_POST['COLESTEROL1'];
$COLESTEROL2 = $_POST['COLESTEROL2'];
$VLDL = $_POST['VLDL'];
$ATERO = $_POST['ATERO'];
$BUN = $_POST['BUN'];


/*"INSERT INTO ASISTENCIA VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$PRUEBA' ,'$FECHA', '$ASISTENCIA')"*/
		$cone = conectarBD();
		$lol = Verificar_bitacora2($cone,$ID_CANDIDATO, $ID_EVALUACION);
		echo $lol;
		$conexion->set_charset("utf8");

		if($lol=="correcto"){
			$sqlUpdate = "UPDATE medico_bitacora2 SET GLUCOSA = '$GLUCOSA', UREA = '$UREA', CREATININA = '$CREATININA', ACIDO_URICO = '$ACIDO_URICO', COLESTEROL = '$COLESTEROL', TRIGLICERIDOS = '$TRIGLICERIDOS', COLESTEROL1 = '$COLESTEROL1', COLESTEROL2 = '$COLESTEROL2', VLDL = '$VLDL', ATERO = '$ATERO', BUN = '$BUN' WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION ='$ID_EVALUACION'";
			if ($conexion->query($sqlUpdate) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
			
		}

		else{
			$sqlInsert = "INSERT INTO medico_bitacora2 VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$GLUCOSA','$UREA' ,'$CREATININA', '$ACIDO_URICO', '$COLESTEROL', '$TRIGLICERIDOS', '$COLESTEROL1', '$COLESTEROL2', '$VLDL', '$ATERO', '$BUN')";

			if ($conexion->query($sqlInsert) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
		}
		

$conexion->close();

?>