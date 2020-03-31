<?php
header("Content-type: text/html; charset=utf8");
include ("../../MySqlConnect.php");
include ("../../conection.php"); 

$query = sprintf("SELECT DISTINCT CONCAT (PRIMER_APELLIDO, ' ', SEGUNDO_APELLIDO, ' ', PRIMER_NOMBRE,' ', SEGUNDO_NOMBRE) AS NOMBRE, 
	CANDIDATOS.CURP, OFICIOS.NUM_OFICIO AS OFICIO, OFICIOS.*, EVALUACION.*, IF (CANDIDATOS_NO_EVALUABLES.MOTIVO IS NULL, '-', CANDIDATOS_NO_EVALUABLES.MOTIVO) AS MOTIVO
	FROM CANDIDATOS LEFT JOIN EVALUACION ON (CANDIDATOS.ID_CANDIDATO = EVALUACION.ID_CANDIDATO ) 
	LEFT JOIN OFICIOS ON (evaluacion.ID_EVALUACION = OFICIOS.ID_EVALUACION)
	LEFT JOIN CANDIDATOS_NO_EVALUABLES ON (EVALUACION.ID_CANDIDATO = CANDIDATOS_NO_EVALUABLES.ID_CANDIDATO)
	WHERE EVALUACION.AUTORIZACION NOT IN ('FF') AND AUTORIZACION IN (001,111,100,000,110)
	ORDER BY OFICIO DESC");

$conexion = new MySqlConnect($db, $user, $pswd);
$conexion->executeSelectQuery($query, TRUE);
$conexion->closeMySqlConnection();
?>