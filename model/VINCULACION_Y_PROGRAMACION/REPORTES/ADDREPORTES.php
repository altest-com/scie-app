<?php
header("Content-type: text/html; charset=utf8");
require("../../conexion.php"); 
include_once "ConexionBD.php";

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$CURP = $_POST['CURP'];
$COMENTARIO = $_POST['COMENTARIO'];
$RESULTADO = $_POST['RESULTADO'];
$DEPARTAMENTO_ORIGEN = $_POST['DEPARTAMENTO_ORIGEN'];
$FECHA_CAMBIO_TOX = "";

if($DEPARTAMENTO_ORIGEN == 1) {
	$DEPARTAMENTO_ORIGEN = "POLIGRAFÍA";
}
else if($DEPARTAMENTO_ORIGEN == 2){
	$DEPARTAMENTO_ORIGEN = "PSICOLOGÍA";
}
else if($DEPARTAMENTO_ORIGEN == 3){
	$DEPARTAMENTO_ORIGEN = "INVESTIGACIÓN SOCIOECONOMICO";
}
else if($DEPARTAMENTO_ORIGEN == 4){
	$DEPARTAMENTO_ORIGEN = "MÉDICO";
}
else if($DEPARTAMENTO_ORIGEN == 5){
	$DEPARTAMENTO_ORIGEN = "TOXICOLÓGICO";
}
else if($DEPARTAMENTO_ORIGEN == 6){
	$DEPARTAMENTO_ORIGEN = "INTEGRACIÓN";
}
$sql ="";
if (isset($_POST['FECHA_CAMBIO_RES_TOX']))
{
	$FECHA_CAMBIO_TOX = $_POST['FECHA_CAMBIO_RES_TOX'];
}
else
{
	$FECHA_CAMBIO_TOX = "";
}
if($RESULTADO=="0"){
	$RESUL = "NO APROBADO";
}
else if($RESULTADO=="1"){
	$RESUL = "APROBADO";
}
else if($RESULTADO=="2"){
	$RESUL = "APROBADO CON SEGUIMIENTO";
}
else if($RESULTADO=="3"){
	$RESUL = "APROBADO CON RESTRICCIONES";
}
else if($RESULTADO=="4"){
	$RESUL = "PENDIENTE";
}
else{
	$RESUL = "NO APLICA";
}
		if ($DEPARTAMENTO_ORIGEN == "MÉDICO") {
			$cone = conectarBD();
			$lol = Verificar_reportes_med($cone,$ID_CANDIDATO, $ID_EVALUACION);

			if($lol == "incorrecto"){
				$sql = ("INSERT INTO reportes_med VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$COMENTARIO' ,'$CURP', '$RESULTADO')");
				$conexion->set_charset("utf8");

				if ($conexion->query($sql) === TRUE) {
	   	 			echo "true";
				} else {
	    			echo "false";
	    		}
	    	}
	    	else{
	    		$sql = ("UPDATE reportes_med SET COMENTARIO = '$COMENTARIO', CURP = '$CURP', RESULTADO = '$RESULTADO' WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION ='$ID_EVALUACION'");
				$conexion->set_charset("utf8");

				if ($conexion->query($sql) === TRUE) {
	   	 			echo "true";
				} else {
	    			echo "false";
	    		}
	    	}
		}
		else if ($DEPARTAMENTO_ORIGEN == "INTEGRACIÓN") {
			$cone = conectarBD();
			$lol = Verificar_reportes_int($cone,$ID_CANDIDATO, $ID_EVALUACION);

			if($lol == "incorrecto"){
				$sql = ("INSERT INTO reporte_integracion VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$COMENTARIO' ,'', '$RESULTADO')");
				$conexion->set_charset("utf8");

				if ($conexion->query($sql) === TRUE) {
	   	 			echo "true";
				} else {
	    			echo "false";
	    		}
	    		$sql = ("UPDATE concentrado_integracion SET RI = '$RESUL' WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION ='$ID_EVALUACION'");
				$conexion->set_charset("utf8");

				if ($conexion->query($sql) === TRUE) {
	   	 			echo "true";
				} else {
	    			echo "false";
	    		}
	    	}
	    	else{
	    		$sql = ("UPDATE reporte_integracion SET SINTESIS = '$COMENTARIO', RESULTADO = '$RESULTADO' WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION ='$ID_EVALUACION'");
				$conexion->set_charset("utf8");

				if ($conexion->query($sql) === TRUE) {
	   	 			echo "true";
				} else {
	    			echo "false";
	    		}
	    		$sql = ("UPDATE concentrado_integracion SET RI = '$RESUL' WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION ='$ID_EVALUACION'");
				$conexion->set_charset("utf8");

				if ($conexion->query($sql) === TRUE) {
	   	 			echo "true";
				} else {
	    			echo "false";
	    		}
	    	}
		}
		else{
			$cone = conectarBD();
			$lol = Verificar_reportes($cone,$ID_CANDIDATO, $ID_EVALUACION,$DEPARTAMENTO_ORIGEN);

			if($lol == "incorrecto"){
				$sql = ("INSERT INTO reportes VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$COMENTARIO' ,'$CURP', '$RESULTADO', '$DEPARTAMENTO_ORIGEN','$FECHA_CAMBIO_TOX')");
				$conexion->set_charset("utf8");

				if ($conexion->query($sql) === TRUE) {
	   	 			echo "true";
				} else {
	    			echo "false";
	    		}
	    	}
	    	else{
	    		$sql = ("UPDATE reportes SET COMENTARIO = '$COMENTARIO', CURP = '$CURP', RESULTADO = '$RESULTADO', FECHA_CAMBIO_RES_TOX ='$FECHA_CAMBIO_TOX' WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION ='$ID_EVALUACION' AND DEPARTAMENTO_ORIGEN = '$DEPARTAMENTO_ORIGEN'");
				$conexion->set_charset("utf8");

				if ($conexion->query($sql) === TRUE) {
	   	 			echo "true";
				} else {
	    			echo "false";
	    		}
	    	}
		}
		
    	

$conexion->close();

?>