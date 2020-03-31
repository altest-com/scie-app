<?php
header("Content-type: text/html; charset=utf8");
include ("../../conection.php");
include ("../../MySqlConnect.php"); 
$conexion = new MySqlConnect($db, $user, $pswd);
$query = sprintf("SELECT IF(evaluacion.AUTORIZACION LIKE '000', 'VP', 'INT') AS ORIGEN,
	CONCAT(PRIMER_NOMBRE,' ',SEGUNDO_NOMBRE,' ',PRIMER_APELLIDO,' ',SEGUNDO_APELLIDO) AS NOMBRE, candidatos.CURP, evaluacion.*, oficios.NUM_OFICIO
	FROM candidatos LEFT JOIN evaluacion ON (candidatos.ID_CANDIDATO = evaluacion.ID_CANDIDATO)
	LEFT JOIN oficios ON (evaluacion.ID_EVALUACION = oficios.ID_EVALUACION)
	WHERE evaluacion.AUTORIZACION = '000' OR evaluacion.AUTORIZACION = '110'");
$conexion->executeSelectQuery($query, TRUE);
$conexion->closeMySqlConnection();
?>

