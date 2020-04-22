<?php
function conectarBD(){
	$server = 'localhost';
	$database = 'siiec';
	$user = 'root';
	$password = '';
	$conexion = new PDO('mysql:host='.$server.';dbname='.$database.'',$user,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	return $conexion;
}
function Verificar_caducidad($conexion){
	
	$consulta = $conexion->prepare('SELECT * from toxicologia_caducidad WHERE FECHA BETWEEN NOW() AND date_add(NOW(), INTERVAL 60 DAY) AND CANTIDAD !="0" AND VISTO ="0"');
	$consulta->execute();
	$resultado = $consulta->fetchAll();
	if($resultado == null){
		return "incorrecto";
	}else{
		return $resultado;
	}
}
function produc_name($conexion, $id){
	
	$consulta = $conexion->prepare('SELECT * from toxicologia_productos WHERE ID_PRODUCTO = :idc');
	$consulta->execute(array(':idc' => $id));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return $resultado;
	}
}
function CADUCIDAD($conexion,$id,$CANTIDAD){
	
	$consulta = $conexion->prepare('SELECT * from toxicologia_caducidad WHERE ID_PRODUCTO = :idc AND CANTIDAD > 0  ORDER BY FECHA ASC');
	$consulta->execute(array(':idc' => $id));
	$resultado = $consulta->fetch();
	if($CANTIDAD>$resultado[3]){
		$CANTIDAD = $CANTIDAD - $resultado[3];
		$consulta = $conexion->prepare('UPDATE toxicologia_caducidad SET CANTIDAD = 0 WHERE ID = :idc');
		$consulta->execute(array(':idc' => $resultado[0]));
		CADUCIDAD($conexion, $id,$CANTIDAD);
	}
	else{
		$consulta = $conexion->prepare('UPDATE toxicologia_caducidad SET CANTIDAD = CANTIDAD - :CANTIDAD WHERE ID = :idc');
		$consulta->execute(array(':idc' => $resultado[0],':CANTIDAD' => $CANTIDAD));
		$resultado = $consulta->fetch();
	}
}
function VISTO($conexion,$id){
	
	$consulta = $conexion->prepare('UPDATE toxicologia_caducidad SET VISTO = 1 WHERE ID = :idc');
	$consulta->execute(array(':idc' => $id));
	$resultado = $consulta->fetch();
	
}
function ID($conexion, $id){
	
	$consulta = $conexion->prepare('SELECT C.ID FROM toxicologia_productos_historial H INNER JOIN toxicologia_caducidad C ON H.ID_PRODUCTO = C.ID_PRODUCTO AND H.CADUCIDAD = C.FECHA WHERE H.ID = :idc');
	$consulta->execute(array(':idc' => $id));
	$resultado = $consulta->fetch();
	if($resultado == null){
		return "incorrecto";
	}else{
		return $resultado[0];
	}
}
?>