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
	$consulta = $conexion->prepare('SELECT * FROM candidatos_no_evaluables WHERE ID_CANDIDATO = :idc');
	$consulta->execute(array(':idc' => $id_c));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
?>