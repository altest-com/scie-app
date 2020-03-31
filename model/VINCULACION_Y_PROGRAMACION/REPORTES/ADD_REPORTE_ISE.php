<?php
header("Content-type: text/html; charset=utf8");
require("../../conexion.php"); 
include_once "../ConexionBD.php"; 

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$DIAGNOSTICO = $_POST['DIAGNOSTICO'];
$SINTESIS = $_POST['SINTESIS'];
$COMENTARIO = $_POST['COMENTARIO'];
$RESULTADO = $_POST['RESULTADO'];

		$cone = conectarBD();
		$lol = Verificar_Resultado($cone,$ID_CANDIDATO, $ID_EVALUACION);
		echo $lol;

    	if($lol=="correcto"){
			$sqlUpdate = "UPDATE reporte_ise SET DIAGNOSTICO = '$DIAGNOSTICO', SINTESIS = '$SINTESIS', COMENTARIO = '$COMENTARIO', RESULTADO = '$RESULTADO' WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION ='$ID_EVALUACION'";
			if ($conexion->query($sqlUpdate) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
			
		}

		else{
			$sql = ("INSERT INTO reporte_ise VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$DIAGNOSTICO' ,'$SINTESIS', '$COMENTARIO', '$RESULTADO')");

			$conexion->set_charset("utf8");

			if ($conexion->query($sql) === TRUE) {
		   	 	echo "true";
			} else {
		    	echo "false";
			}
		}
$conexion->close();

?>