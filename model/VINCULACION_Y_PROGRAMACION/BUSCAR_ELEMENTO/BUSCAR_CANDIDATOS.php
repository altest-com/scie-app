<?php
error_reporting(0);
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
include ("../../conection.php");
include ("../../MySqlConnect.php");
$NOMBRE = $_POST['NOMBRE'];
$CURP = $_POST['CURP'];
$FOLIO = $_POST['FOLIO'];
$conexion = new MySqlConnect($db, $user, $pswd);
if (isset($NOMBRE) && !empty($NOMBRE))
{
	$sqlQuery = sprintf("SELECT PRIMER_APELLIDO, SEGUNDO_APELLIDO, PRIMER_NOMBRE, SEGUNDO_NOMBRE, CURP, ID_CANDIDATO
	FROM CANDIDATOS WHERE CONCAT (PRIMER_APELLIDO, IF (SEGUNDO_APELLIDO != ' ', SEGUNDO_APELLIDO, ''), PRIMER_NOMBRE, IF (SEGUNDO_NOMBRE != ' ', SEGUNDO_NOMBRE, '')) LIKE '%%%s%%'
	OR CONCAT (PRIMER_NOMBRE, IF (SEGUNDO_NOMBRE != ' ', SEGUNDO_NOMBRE, ''), PRIMER_APELLIDO, IF (SEGUNDO_APELLIDO != ' ', SEGUNDO_APELLIDO, '')) LIKE '%%%s%%'
	ORDER BY PRIMER_APELLIDO", $NOMBRE, $NOMBRE);
	$conexion->executeSelectQuery($sqlQuery, TRUE);
} 
else if (isset($CURP) && !empty($CURP))
{
	$sqlQuery = sprintf("SELECT * FROM CANDIDATOS WHERE CURP = '%s'", $CURP);
	$conexion->executeSelectQuery($sqlQuery, TRUE);
}
else if (isset($FOLIO) && !empty($FOLIO))
{
	$sqlQuery = sprintf("SELECT * FROM EVALUACION WHERE FOLIO = '%s'", $FOLIO);
	$conexion->executeSelectQuery($sqlQuery, TRUE);
}
else
{
	echo "[]";
}
$conexion->closeMySqlConnection();
?>