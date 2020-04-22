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
	$consulta = $conexion->prepare('SELECT * FROM toxicologico_bitacora1 WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_bitacora2($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM toxicologico_bitacora2 WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_alerta($conexion,$id_c, $id_e){
	$depo = "TOXICOLÓGICO";
	$consulta = $conexion->prepare('SELECT * FROM alerta_de_riesgo WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide AND DEPARTAMENTO_ORIGEN = :dep');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e,':dep' => $depo));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_bitacora4($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM toxicologico_bitacora4 WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_bitacora3($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM toxicologico_bitacora3 WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_resultado($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM toxicologico_resultados WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_supervision($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM toxicologico_supervision WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_oficio1($conexion,$id_c){
	$FECHA1 = $id_c." 00:00:01";
	$FECHA2 = $id_c." 23:59:59";
	$consulta = $conexion->prepare('SELECT * FROM medico_bitacora2 T INNER JOIN candidatos C ON C.ID_CANDIDATO = T.ID_CANDIDATO INNER JOIN evaluacion E ON E.ID_CANDIDATO = T.ID_CANDIDATO WHERE E.FECHA_EXAMEN_MEDICO BETWEEN :idc AND :ide');
	$consulta->execute(array(':idc' => $FECHA1,':ide' => $FECHA2));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_oficio2($conexion,$id_c){
	$FECHA1 = $id_c." 00:00:01";
	$FECHA2 = $id_c." 23:59:59";
	$consulta = $conexion->prepare('SELECT * FROM medico_bitacora1 T INNER JOIN candidatos C ON C.ID_CANDIDATO = T.ID_CANDIDATO INNER JOIN evaluacion E ON E.ID_CANDIDATO = T.ID_CANDIDATO WHERE E.FECHA_EXAMEN_MEDICO BETWEEN :idc AND :ide');
	$consulta->execute(array(':idc' => $FECHA1,':ide' => $FECHA2));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_oficio3($conexion,$id_c){
	$FECHA1 = $id_c." 00:00:01";
	$FECHA2 = $id_c." 23:59:59";
	$consulta = $conexion->prepare('SELECT * FROM medico_bitacora3 T INNER JOIN candidatos C ON C.ID_CANDIDATO = T.ID_CANDIDATO INNER JOIN evaluacion E ON E.ID_CANDIDATO = T.ID_CANDIDATO WHERE E.FECHA_EXAMEN_MEDICO BETWEEN :idc AND :ide');
	$consulta->execute(array(':idc' => $FECHA1,':ide' => $FECHA2));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
?>