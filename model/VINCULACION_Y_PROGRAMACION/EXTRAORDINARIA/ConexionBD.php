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
	$ESTATUS = "0";
	$consulta = $conexion->prepare('SELECT * FROM vinculacion_curps_ext WHERE CURP = :idc and ESTATUS = :EST');
	$consulta->execute(array(':idc' => $CURP,':EST' => $ESTATUS));
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
?>