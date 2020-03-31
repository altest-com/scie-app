<?php

function conectarBD(){
	$server = 'localhost';
	$database = 'siiec';
	$user = 'root';
	$password = '';
	$conexion = new PDO('mysql:host='.$server.';dbname='.$database.'',$user,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	return $conexion;
}
function Verificar_candidato($conexion,$id_c){
	$consulta = $conexion->prepare('SELECT * FROM evaluacion WHERE ID_CANDIDATO = :idc');
	$consulta->execute(array(':idc' => $id_c));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "correcto";
	}else{
		return "incorrecto";
	}
}
function fecha($conexion,$id_c){
	$consulta = $conexion->prepare('SELECT FECHA FROM OFICIOS WHERE ID_CANDIDATO = :idc ORDER BY FECHA DESC LIMIT 1');
	$consulta->execute(array(':idc' => $id_c));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return $resultado[0];
	}
}
?>