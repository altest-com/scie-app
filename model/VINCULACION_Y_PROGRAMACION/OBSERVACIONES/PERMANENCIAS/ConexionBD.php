<?php

function conectarBD(){
	$server = 'localhost';
	$database = 'siiec';
	$user = 'root';
	$password = '';
	$conexion = new PDO('mysql:host='.$server.';dbname='.$database.'',$user,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	return $conexion;
}
function Verificar_candidato($conexion,$CURP){
	
	$consulta = $conexion->prepare('SELECT * FROM candidatos WHERE CURP = :idc');
	$consulta->execute(array(':idc' => $CURP));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_curp($conexion,$CURP){
	
	$consulta = $conexion->prepare('SELECT * FROM vinculacion_curps WHERE CURP = :idc AND ESTATUS = :EST');
	$consulta->execute(array(':idc' => $CURP,':EST' => "0"));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "correcto";
	}else{
		return "incorrecto";
	}
}
function Consultar_ID_CANDIDATO($conexion,$CURP){
	$consulta = $conexion->prepare('SELECT * FROM candidatos WHERE CURP = :idc');
	$consulta->execute(array(':idc' => $CURP));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return $resultado[0];
	}
}
function Consultar_ID($conexion){
	$consulta = $conexion->prepare('SELECT * FROM vinculacion_curps ORDER BY ID DESC');
	$consulta->execute();
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return $resultado[0];
	}
}
function Consultar_TOTAL($conexion){
	$consulta = $conexion->prepare('SELECT COUNT(*) AS TOTAL FROM vinculacion_curps V LEFT JOIN oficios O ON V.ID_EVALUACION = O.ID_EVALUACION ORDER BY V.ID ASC');
	$consulta->execute();
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return $resultado[0];
	}
}
?>