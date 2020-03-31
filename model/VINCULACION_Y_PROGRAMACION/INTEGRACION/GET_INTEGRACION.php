<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 
include_once "ConexionBD.php";
error_reporting(0);
if(isset($_POST['ID_EVALUADOR'])){
	$ID_EVALUADOR = $_POST['ID_EVALUADOR'];
	$cone = conectarBD();
	$lol = Obtener_Permisos($cone,$ID_EVALUADOR);
}
else{
	$lol = "INFO";
}


$conexion->set_charset("utf8");
	if($lol=="INFO"){
		if ($result = $conexion->query("SELECT DISTINCT * FROM integracion"))  {
				while($row = $result->fetch_array(MYSQLI_ASSOC)) {
		            $myArray[] = $row;
		    	}
		    	//echo print_r($myArray);
		    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
		    	$result -> close();
	    	}
	}
	else{
		if($lol=="ADMINISTRADOR" || $lol=="JEFE DE AREA" || $lol=="SUPERVISOR"){
			if ($result = $conexion->query("SELECT DISTINCT *,(SELECT ID_EVALUADOR FROM evaluador_evaluacion WHERE ID_EVALUACION LIKE I.ID_EVALUACION AND DEPARTAMENTO = 'INTEGRACIÓN') AS EVALUADOR FROM integracion I LEFT JOIN autorizar_informacion A ON I.ID_EVALUACION = A.ID_EVALUACION WHERE I.INTEG='0' AND A.ESTATUS ='1'"))  {
				while($row = $result->fetch_array(MYSQLI_ASSOC)) {
		            $myArray[] = $row;
		    	}
		    	//echo print_r($myArray);
		    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
		    	$result -> close();
	    	}
		}
		else{
			if ($result = $conexion->query("SELECT *, ID_EVALUADOR AS EVALUADOR FROM integracion LEFT JOIN evaluador_evaluacion ON(integracion.ID_EVALUACION = evaluador_evaluacion.ID_EVALUACION) LEFT JOIN autorizar_informacion A ON integracion.ID_EVALUACION = A.ID_EVALUACION WHERE ID_EVALUADOR = '$ID_EVALUADOR' AND DEPARTAMENTO = 'INTEGRACIÓN' AND INTEG='0' AND A.ESTATUS='1'"))  {
				while($row = $result->fetch_array(MYSQLI_ASSOC)) {
		            $myArray[] = $row;
		    	}
		    	//echo print_r($myArray);
		    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
		    	$result -> close();
	    	}
		}
	}
		

$conexion -> close();
?>