<?php

function conectarBD(){
	$server = 'localhost';
	$database = 'siiec';
	$user = 'root';
	$password = '';
	$conexion = new PDO('mysql:host='.$server.';dbname='.$database.'',$user,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	return $conexion;
}
function Resultado01($conexion,$departamento,$FECHA1,$FECHA2){
	if ($departamento == "1") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reportes_med R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='0' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}	
	else if ($departamento == "2") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reportes R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='0' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "3") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reporte_poligrafia R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='0' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "4") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reporte_integracion R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='0' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "5") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reporte_ise R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='0' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "6") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN psicologia_reporte R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='0' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
}
function Resultado02($conexion,$departamento,$FECHA1,$FECHA2){
	if ($departamento == "1") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reportes_med R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='1' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}	
	else if ($departamento == "2") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reportes R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='1' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "3") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reporte_poligrafia R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='1' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "4") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reporte_integracion R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='1' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "5") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reporte_ise R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='1' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "6") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN psicologia_reporte R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE AND R.RESULTADO ='1' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
}
function Resultado03($conexion,$departamento,$FECHA1,$FECHA2){
	if ($departamento == "1") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reportes_med R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='2' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}	
	else if ($departamento == "2") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reportes R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='2' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "3") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reporte_poligrafia R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='2' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "4") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reporte_integracion R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='2' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "5") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reporte_ise R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='2' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "6") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN psicologia_reporte R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='2' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
}
function Resultado04($conexion,$departamento,$FECHA1,$FECHA2){
	if ($departamento == "1") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reportes_med R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='3' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}	
	else if ($departamento == "2") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reportes R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='3' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "3") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reporte_poligrafia R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='3' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "4") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reporte_integracion R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='3' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "5") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reporte_ise R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='3' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "6") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN psicologia_reporte R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='3' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
}
function Resultado05($conexion,$departamento,$FECHA1,$FECHA2){
	if ($departamento == "1") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reportes_med R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='5' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}	
	else if ($departamento == "2") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reportes R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='5' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "3") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reporte_poligrafia R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='5' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "4") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reporte_integracion R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='5' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "5") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reporte_ise R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='5' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "6") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN psicologia_reporte R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='5' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
}
function Resultado06($conexion,$departamento,$FECHA1,$FECHA2){
	if ($departamento == "4") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reporte_integracion R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2' AND EV.ID_EVALUACION NOT IN (SELECT EVALUACION_DERIVADA_DE FROM evaluacion WHERE EVALUACION_DERIVADA_DE LIKE '%_%' AND FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2') AND R.RESULTADO = '7'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	
}
function Resultado07($conexion,$departamento,$FECHA1,$FECHA2){
	if ($departamento == "4") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reporte_integracion R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2' AND EV.ID_EVALUACION NOT IN (SELECT EVALUACION_DERIVADA_DE FROM evaluacion WHERE EVALUACION_DERIVADA_DE LIKE '%_%' AND FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2') AND R.RESULTADO IS NULL AND EV.EVALUACION_DERIVADA_DE LIKE '%_%'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	
}
function Resultado11($conexion,$departamento,$FECHA1,$FECHA2){
	if ($departamento == "1") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.MEDICO_R ='0' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}	
	else if ($departamento == "2") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE (R.TOX_R='0' OR R.TOX_R2='0') AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "3") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE (R.POLIGRAFIA_R ='0' OR R.POLIGRAFIA2_R='0') AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "4") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.INTEGRACION_R ='0' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "5") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.ISE_R ='0' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "6") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.PSICO_R ='0' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
}
function Resultado12($conexion,$departamento,$FECHA1,$FECHA2){
	if ($departamento == "1") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.MEDICO_R ='1' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}	
	else if ($departamento == "2") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE (R.TOX_R='1' OR R.TOX_R2='1') AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "3") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE (R.POLIGRAFIA_R ='1' OR R.POLIGRAFIA2_R='1') AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "4") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.INTEGRACION_R ='1' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "5") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.ISE_R ='1' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "6") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.PSICO_R ='1' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
}
function Resultado13($conexion,$departamento,$FECHA1,$FECHA2){
	if ($departamento == "1") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.MEDICO_R ='2' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}	
	else if ($departamento == "2") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE (R.TOX_R='2' OR R.TOX_R2='2') AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "3") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE (R.POLIGRAFIA_R ='2' OR R.POLIGRAFIA2_R='2') AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "4") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.INTEGRACION_R ='2' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "5") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.ISE_R ='2' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "6") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.PSICO_R ='2' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
}
function Resultado14($conexion,$departamento,$FECHA1,$FECHA2){
	if ($departamento == "1") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.MEDICO_R ='3' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}	
	else if ($departamento == "2") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE (R.TOX_R='3' OR R.TOX_R2='3') AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "3") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE (R.POLIGRAFIA_R ='3' OR R.POLIGRAFIA2_R='3') AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "4") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.INTEGRACION_R ='3' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "5") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.ISE_R ='3' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "6") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.PSICO_R ='3' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
}
function Resultado15($conexion,$departamento,$FECHA1,$FECHA2){
	if ($departamento == "1") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.MEDICO_R ='5' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}	
	else if ($departamento == "2") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE (R.TOX_R='5' OR R.TOX_R2='5') AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "3") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE (R.POLIGRAFIA_R ='5' OR R.POLIGRAFIA2_R='5') AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "4") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.INTEGRACION_R ='5' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "5") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.ISE_R ='5' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "6") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.PSICO_R ='5' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
}
function Resultado16($conexion,$departamento,$FECHA1,$FECHA2){
	if ($departamento == "4") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.INTEGRACION_R ='6' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}	
}
function Resultado17($conexion,$departamento,$FECHA1,$FECHA2){
	if ($departamento == "4") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.INTEGRACION_R ='7' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}	
}

function Resultado21($conexion,$departamento,$FECHA1,$FECHA2){
	if ($departamento == "1") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reportes R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.DEPARTAMENTO_ORIGEN = 'MÉDICO' AND R.RESULTADO ='0' AND EV.FECHA_EXAMEN_MEDICO BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}	
	else if ($departamento == "2") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reportes R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.DEPARTAMENTO_ORIGEN = 'TOXICOLÓGICO' AND R.RESULTADO ='0' AND EV.FECHA_EXAMEN_TOXICOLOGICO BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "3") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reportes R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.DEPARTAMENTO_ORIGEN = 'POLIGRAFÍA' AND R.RESULTADO ='0' AND EV.FECHA_EXAMEN_POLIGRAFICO BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "4") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN resultados_integracion R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='0' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "5") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reporte_ise R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='0' AND EV.FECHA_ISE_ENTREVISTA BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "6") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reportes R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.DEPARTAMENTO_ORIGEN = 'PSICOLOGÍA' AND R.RESULTADO ='0' AND EV.FECHA_EXAMEN_PSICOLOGICO BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
}
function Resultado22($conexion,$departamento,$FECHA1,$FECHA2){
	if ($departamento == "1") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reportes R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.DEPARTAMENTO_ORIGEN = 'MÉDICO' AND R.RESULTADO ='1' AND EV.FECHA_EXAMEN_MEDICO BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}	
	else if ($departamento == "2") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reportes R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.DEPARTAMENTO_ORIGEN = 'TOXICOLÓGICO' AND R.RESULTADO ='1' AND EV.FECHA_EXAMEN_TOXICOLOGICO BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "3") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reportes R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.DEPARTAMENTO_ORIGEN = 'POLIGRAFÍA' AND R.RESULTADO ='1' AND EV.FECHA_EXAMEN_POLIGRAFICO BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "4") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN resultados_integracion R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='1' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "5") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reporte_ise R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='1' AND EV.FECHA_ISE_ENTREVISTA BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "6") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reportes R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.DEPARTAMENTO_ORIGEN = 'PSICOLOGÍA' AND R.RESULTADO ='1' AND EV.FECHA_EXAMEN_PSICOLOGICO BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
}
function Resultado23($conexion,$departamento,$FECHA1,$FECHA2){
	if ($departamento == "1") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reportes R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.DEPARTAMENTO_ORIGEN = 'MÉDICO' AND R.RESULTADO ='2' AND EV.FECHA_EXAMEN_MEDICO BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}	
	else if ($departamento == "2") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reportes R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.DEPARTAMENTO_ORIGEN = 'TOXICOLÓGICO' AND R.RESULTADO ='2' AND EV.FECHA_EXAMEN_TOXICOLOGICO BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "3") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reportes R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.DEPARTAMENTO_ORIGEN = 'POLIGRAFÍA' AND R.RESULTADO ='2' AND EV.FECHA_EXAMEN_POLIGRAFICO BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "4") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN resultados_integracion R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='2' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "5") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reporte_ise R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='2' AND EV.FECHA_ISE_ENTREVISTA BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "6") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reportes R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.DEPARTAMENTO_ORIGEN = 'PSICOLOGÍA' AND R.RESULTADO ='2' AND EV.FECHA_EXAMEN_PSICOLOGICO BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
}
function Resultado24($conexion,$departamento,$FECHA1,$FECHA2){
	if ($departamento == "1") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reportes R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.DEPARTAMENTO_ORIGEN = 'MÉDICO' AND R.RESULTADO ='3' AND EV.FECHA_EXAMEN_MEDICO BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}	
	else if ($departamento == "2") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reportes R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.DEPARTAMENTO_ORIGEN = 'TOXICOLÓGICO' AND R.RESULTADO ='3' AND EV.FECHA_EXAMEN_TOXICOLOGICO BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "3") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reportes R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.DEPARTAMENTO_ORIGEN = 'POLIGRAFÍA' AND R.RESULTADO ='3' AND EV.FECHA_EXAMEN_POLIGRAFICO BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "4") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN resultados_integracion R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='3' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "5") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reporte_ise R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='3' AND EV.FECHA_ISE_ENTREVISTA BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "6") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reportes R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.DEPARTAMENTO_ORIGEN = 'PSICOLOGÍA' AND R.RESULTADO ='3' AND EV.FECHA_EXAMEN_PSICOLOGICO BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
}
function Resultado25($conexion,$departamento,$FECHA1,$FECHA2){
	if ($departamento == "1") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reportes R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.DEPARTAMENTO_ORIGEN = 'MÉDICO' AND R.RESULTADO ='5' AND EV.FECHA_EXAMEN_MEDICO BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}	
	else if ($departamento == "2") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reportes R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.DEPARTAMENTO_ORIGEN = 'TOXICOLÓGICO' AND R.RESULTADO ='5' AND EV.FECHA_EXAMEN_TOXICOLOGICO BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "3") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reportes R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.DEPARTAMENTO_ORIGEN = 'POLIGRAFÍA' AND R.RESULTADO ='5' AND EV.FECHA_EXAMEN_POLIGRAFICO BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "4") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN resultados_integracion R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='5' AND EV.FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "5") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reporte_ise R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.RESULTADO ='5' AND EV.FECHA_ISE_ENTREVISTA BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
	else if ($departamento == "6") {
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reportes R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.DEPARTAMENTO_ORIGEN = 'PSICOLOGÍA' AND R.RESULTADO ='5' AND EV.FECHA_EXAMEN_PSICOLOGICO BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
	}
}
function Resultado01_EV($conexion,$departamento,$FECHA1,$FECHA2){
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reporte_integracion R ON EV.ID_EVALUACION = R.ID_EVALUACION LEFT JOIN concentrado_integracion C ON EV.ID_EVALUACION = C.ID_EVALUACION WHERE R.RESULTADO ='0' AND C.FECHA_RI BETWEEN '$FECHA1' AND '$FECHA2' AND C.TIPO ='2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
}
function Resultado02_EV($conexion,$departamento,$FECHA1,$FECHA2){
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reporte_integracion R ON EV.ID_EVALUACION = R.ID_EVALUACION LEFT JOIN concentrado_integracion C ON EV.ID_EVALUACION = C.ID_EVALUACION WHERE R.RESULTADO ='1' AND C.FECHA_RI BETWEEN '$FECHA1' AND '$FECHA2' AND C.TIPO ='2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
}
function Resultado03_EV($conexion,$departamento,$FECHA1,$FECHA2){
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reporte_integracion R ON EV.ID_EVALUACION = R.ID_EVALUACION LEFT JOIN concentrado_integracion C ON EV.ID_EVALUACION = C.ID_EVALUACION WHERE R.RESULTADO ='2' AND C.FECHA_RI BETWEEN '$FECHA1' AND '$FECHA2' AND C.TIPO ='2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
}
function Resultado04_EV($conexion,$departamento,$FECHA1,$FECHA2){
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reporte_integracion R ON EV.ID_EVALUACION = R.ID_EVALUACION LEFT JOIN concentrado_integracion C ON EV.ID_EVALUACION = C.ID_EVALUACION WHERE R.RESULTADO ='3' AND C.FECHA_RI BETWEEN '$FECHA1' AND '$FECHA2' AND C.TIPO ='2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
}
function Resultado05_EV($conexion,$departamento,$FECHA1,$FECHA2){
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reporte_integracion R ON EV.ID_EVALUACION = R.ID_EVALUACION LEFT JOIN concentrado_integracion C ON EV.ID_EVALUACION = C.ID_EVALUACION WHERE R.RESULTADO ='5' AND C.FECHA_RI BETWEEN '$FECHA1' AND '$FECHA2' AND C.TIPO ='2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
}
function Resultado06_EV($conexion,$departamento,$FECHA1,$FECHA2){
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reporte_integracion R ON EV.ID_EVALUACION = R.ID_EVALUACION LEFT JOIN concentrado_integracion C ON EV.ID_EVALUACION = C.ID_EVALUACION WHERE C.FECHA_RI BETWEEN '$FECHA1' AND '$FECHA2' AND EV.ID_EVALUACION NOT IN (SELECT EVALUACION_DERIVADA_DE FROM evaluacion WHERE EVALUACION_DERIVADA_DE LIKE '%_%' AND FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2') AND R.RESULTADO = '7'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];	
}
function Resultado07_EV($conexion,$departamento,$FECHA1,$FECHA2){
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN reporte_integracion R ON EV.ID_EVALUACION = R.ID_EVALUACION LEFT JOIN concentrado_integracion C ON EV.ID_EVALUACION = C.ID_EVALUACION WHERE C.FECHA_RI BETWEEN '$FECHA1' AND '$FECHA2' AND EV.ID_EVALUACION NOT IN (SELECT EVALUACION_DERIVADA_DE FROM evaluacion WHERE EVALUACION_DERIVADA_DE LIKE '%_%' AND FECHA_EVALUACION BETWEEN '$FECHA1' AND '$FECHA2') AND R.RESULTADO IS NULL AND EV.EVALUACION_DERIVADA_DE LIKE '%_%'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];	
}
function Resultado11_EV($conexion,$departamento,$FECHA1,$FECHA2){
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.INTEGRACION_R ='0' AND R.EMISION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
}
function Resultado12_EV($conexion,$departamento,$FECHA1,$FECHA2){
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.INTEGRACION_R ='1' AND R.EMISION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
}
function Resultado13_EV($conexion,$departamento,$FECHA1,$FECHA2){
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.INTEGRACION_R ='2' AND R.EMISION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
}
function Resultado14_EV($conexion,$departamento,$FECHA1,$FECHA2){
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.INTEGRACION_R ='3' AND R.EMISION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
}
function Resultado15_EV($conexion,$departamento,$FECHA1,$FECHA2){
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.INTEGRACION_R ='5' AND R.INTEGRACION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
}
function Resultado16_EV($conexion,$departamento,$FECHA1,$FECHA2){
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.INTEGRACION_R ='6' AND R.EMISION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
}
function Resultado17_EV($conexion,$departamento,$FECHA1,$FECHA2){
		$consulta = $conexion->prepare("SELECT count(*) AS cantidad FROM evaluacion EV LEFT JOIN concentrado_informacion_resultados R ON EV.ID_EVALUACION = R.ID_EVALUACION WHERE R.INTEGRACION_R ='7' AND R.EMISION BETWEEN '$FECHA1' AND '$FECHA2'");
		$consulta->execute(array(':FECHA1' => $FECHA1,':FECHA2' => $FECHA2));
		$resultado = $consulta->fetch();
		return $resultado[0];
}
?>