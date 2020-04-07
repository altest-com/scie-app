<?php

function conectarBD(){
	$server = 'localhost';
	$database = 'siiec';
	$user = 'root';
	$password = '';
	$conexion = new PDO('mysql:host='.$server.';dbname='.$database.'',$user,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	return $conexion;
}
function Verificar_asistencia($conexion,$id_c, $id_e, $fecha,$prueba){
	
	$consulta = $conexion->prepare('SELECT * FROM ASISTENCIA WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide AND PRUEBA = :pru');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e,':pru' => $prueba));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_bitacora1($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM calificacion_psicologico WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_asistencia_entrevista($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM asistencia_entrevista_psicologia WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "No";
	}else{
		return "Si";
	}
}
function Verificar_psicometria($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM psicometria WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return $resultado[2];
	
	}
}
function Verificar_historia($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM historia_datos_generales WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_reporte($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM psicologia_reporte WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_cali($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM calificacion_psicologico WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}

?>