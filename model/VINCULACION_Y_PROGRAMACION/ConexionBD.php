<?php

function conectarBD(){
	$server = 'localhost';
	$database = 'siiec';
	$user = 'root';
	$password = '';
	$conexion = new PDO('mysql:host='.$server.';dbname='.$database.'',$user,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	return $conexion;
}
function Verificar_Entrevista($conexion,$id_c, $id_e){
	
	$consulta = $conexion->prepare('SELECT * FROM entrevista WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_Resultado($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM reporte_ise WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}

?>