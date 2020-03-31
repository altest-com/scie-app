<?php

function conectarBD(){
	$server = 'localhost';
	$database = 'siiec';
	$user = 'root';
	$password = '';
	$conexion = new PDO('mysql:host='.$server.';dbname='.$database.'',$user,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	return $conexion;
}
function Obtener_Permisos($conexion,$id_c){
	
	$consulta = $conexion->prepare('SELECT * FROM evaluadores WHERE ID_EVALUADOR = :idc');
	$consulta->execute(array(':idc' => $id_c));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return $resultado[9];
	}
}
function Obtener_DERIBADA($conexion,$id_c){
	
	$consulta = $conexion->prepare('SELECT EVALUACION_DERIVADA_DE FROM evaluacion WHERE ID_EVALUACION = :idc AND EVALUACION_DERIVADA_DE LIKE "%_%"');
	$consulta->execute(array(':idc' => $id_c));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return $resultado[0];
	}
}
function Obtener_fecha($conexion,$id_c,$PRUEBA){
	
	$consulta = $conexion->prepare('SELECT FECHA FROM asistencia WHERE ID_EVALUACION = :idc AND PRUEBA = :pru');
	$consulta->execute(array(':idc' => $id_c,':pru' => $PRUEBA));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "sin datos";
	}else{
		return $resultado[0];
	}
}
function Obtener_inasistencias($conexion,$fecha){
	
	$consulta = $conexion->prepare("SELECT ID_CANDIDATO, ID_EVALUACION FROM EVALUACION E 
	WHERE (EVALUACION_DERIVADA_DE LIKE '' OR EVALUACION_DERIVADA_DE IS NULL) 
    AND (FOLIO LIKE '-' OR FOLIO IS NULL) 
    AND :pru /*$fechaActual*/
    IN (
        IF(E.EVALUACION_DERIVADA_DE !='',(DATE(E.FECHA_EXAMEN_POLIGRAFICO)),
        DATE(E.FECHA_EXAMEN_TOXICOLOGICO)),
        DATE(E.FECHA_EXAMEN_TOXICOLOGICO)
    )");
	$consulta->execute(array(':pru' => $fecha));
	$resultado = $consulta->fetchAll();
	if($resultado == null){
		return "incorrecto";
	}else{
		return $resultado;
	}
}
?>