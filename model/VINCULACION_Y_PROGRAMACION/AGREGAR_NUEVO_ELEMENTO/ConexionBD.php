<?php

function conectarBD(){
	$server = 'localhost';
	$database = 'siiec';
	$user = 'root';
	$password = '';
	$conexion = new PDO('mysql:host='.$server.';dbname='.$database.'',$user,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	return $conexion;
}
function VERIFICAR_EXISTENCIA($conexion,$id_c, $OFICIO, $FECHA){
	$consulta = $conexion->prepare('SELECT COUNT(*) AS RESULT FROM OFICIOS WHERE ID_CANDIDATO = :idc AND NUM_OFICIO = :ide AND FECHA = :dep');
	$consulta->execute(array(':idc' => $id_c,':ide' => $OFICIO,':dep' => $FECHA));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return $resultado[0];
	}
}

?>