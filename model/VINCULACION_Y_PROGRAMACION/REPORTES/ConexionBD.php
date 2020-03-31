<?php

function conectarBD(){
	$server = 'localhost';
	$database = 'siiec';
	$user = 'root';
	$password = '';
	$conexion = new PDO('mysql:host='.$server.';dbname='.$database.'',$user,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	return $conexion;
}
function Verificar_reportes($conexion,$id_c, $id_e, $departamento){
	$consulta = $conexion->prepare('SELECT * FROM reportes WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide AND DEPARTAMENTO_ORIGEN = :dep');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e,':dep' => $departamento));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_reportes_med($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM reportes_med WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_reportes_int($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM reporte_integracion WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_supervision($conexion,$id_c, $id_e, $departamento){
	$consulta = $conexion->prepare('SELECT * FROM supervision_reporte WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide AND DEPARTAMENTO = :dep');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e,':dep' => $departamento));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return $resultado[3];
	}
}
function Verificar_reportePol($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM reporte_poligrafia WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
?>