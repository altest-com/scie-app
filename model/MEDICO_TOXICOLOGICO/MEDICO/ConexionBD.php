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
	$consulta = $conexion->prepare('SELECT * FROM medico_bitacora1 WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_bitacora2($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM medico_bitacora2 WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_alerta($conexion,$id_c, $id_e){
	$depo = "MÉDICO";
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
	$consulta = $conexion->prepare('SELECT * FROM medico_bitacora3 WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_clinica01($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM medico_clinica01 WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_clinica02($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM medico_clinica02 WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_clinica03($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM medico_clinica03 WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_clinica04($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM medico_clinica04 WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_clinica05($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM medico_clinica05 WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_clinica06($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM medico_clinica06 WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_clinica07($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM medico_clinica07 WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_clinica08($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM medico_clinica08 WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_clinica09($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM medico_clinica09 WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_clinica10($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM medico_clinica10 WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_clinica11($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM medico_clinica11 WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_clinica12($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM medico_clinica12 WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_clinica13($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM medico_clinica13 WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_clinica14($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM medico_clinica14 WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_clinica15($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM medico_clinica15 WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_fotos($conexion,$id_c){
	$consulta = $conexion->prepare('SELECT * FROM medico_fotografias WHERE NOMBRE = :idc');
	$consulta->execute(array(':idc' => $id_c));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function consultar_curp($conexion,$ID_CANDIDATO){
	$consulta = $conexion->prepare('SELECT CURP FROM CANDIDATOS WHERE ID_CANDIDATO = :idc');
	$consulta->execute(array(':idc' => $ID_CANDIDATO));
	$resultado = $consulta->fetch();
	return $resultado[0];
}
function contar_fotos($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM medico_fotografias WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$cuenta = $consulta->rowCount();
	

	return $cuenta;
}
function Verificar_sintesis($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM medico_sintesis WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_supervision($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM medico_supervision WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_concentrado($conexion,$id_c, $id_e){
	$consulta = $conexion->prepare('SELECT * FROM concentrado_medico WHERE ID_CANDIDATO = :idc AND ID_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $id_e));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
	}
}
function Verificar_nombre($conexion,$id_c){
	$consulta = $conexion->prepare('SELECT * FROM medico_fotografias WHERE Nombre = :idc');
	$consulta->execute(array(':idc' => $id_c));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return "correcto";
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
function Consultar_ID_EVALUACION($conexion,$id_c,$fecha){
	$consulta = $conexion->prepare('SELECT * FROM evaluacion WHERE ID_CANDIDATO = :idc AND FECHA_EVALUACION = :ide');
	$consulta->execute(array(':idc' => $id_c,':ide' => $fecha));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return $resultado[0];
	}
}
?>