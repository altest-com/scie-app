<?php

require("../conexion.php");
include_once "ConexionBD.php"; 

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$CURP = $_POST['CURP'];
$DEPARTEMENTO = "PSICOLOGÍA";
$APROBADO = $_POST['APROBADO'];
$CRITERIO1 = $_POST['CRITERIO1'];
$CRITERIO2 = $_POST['CRITERIO2'];
$CRITERIO3 = $_POST['CRITERIO3'];
$CRITERIO4 = $_POST['CRITERIO4'];
$CRITERIO5 = $_POST['CRITERIO5'];
$CRITERIO6 = $_POST['CRITERIO6'];
$CRITERIO7 = $_POST['CRITERIO7'];
$RESULTADO = $_POST['RESULTADO'];
$TRAYECTORIA = $_POST['TRAYECTORIA'];
$PUESTO = $_POST['PUESTO'];
$UNIDAD = $_POST['UNIDAD'];


		$cone = conectarBD();
		$lol = Verificar_reporte($cone,$ID_CANDIDATO,$ID_EVALUACION);
		if($lol == "incorrecto"){
			$conexion->set_charset("utf8");
			$sqlInsert = "INSERT INTO psicologia_reporte VALUES ('$ID_CANDIDATO', '$ID_EVALUACION','$CRITERIO1', '$CRITERIO2', '$CRITERIO3', '$CRITERIO4', '$CRITERIO5', '$CRITERIO6', '$CRITERIO7', '$TRAYECTORIA', '$PUESTO','$UNIDAD','$RESULTADO','$APROBADO')";

			if ($conexion->query($sqlInsert) === TRUE) {
		   	 	echo "true";
			} 
			else {
		    	echo "false";
			}
		}
		else
		{
			$conexion->set_charset("utf8");
			$sqlInsert = "UPDATE psicologia_reporte SET CRITERIO1 = '$CRITERIO1', CRITERIO2 = '$CRITERIO2', CRITERIO3 = '$CRITERIO3',CRITERIO4 = '$CRITERIO4', CRITERIO5 = '$CRITERIO5',CRITERIO6 = '$CRITERIO6',CRITERIO7 = '$CRITERIO7',TRAYECTORIA_LABORAL = '$TRAYECTORIA', PUESTO_FUNCIONAL = '$PUESTO', UNIDAD = '$UNIDAD',COMENTARIO ='$RESULTADO',RESULTADO='$APROBADO' WHERE ID_CANDIDATO ='$ID_CANDIDATO' AND ID_EVALUACION = '$ID_EVALUACION'";

			if ($conexion->query($sqlInsert) === TRUE) {
		   	 	echo "true";
			} 
			else {
		    	echo "false";
			}		
		}


		
		

$conexion->close();

?>