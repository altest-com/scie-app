<?php
header("Content-type: text/html; charset=utf8");
include ("../../MySqlConnect.php");
include ("../../conection.php");
$TIPO_BUSQUEDA = $_POST['TIPO_BUSQUEDA'];
$PARAM = $_POST['PARAM'];
$query = "";
switch ((int)$TIPO_BUSQUEDA)
{
	case 0:
	// Folio
	$query = sprintf("SELECT (SELECT CONCAT(PRIMER_APELLIDO, ' ', SEGUNDO_APELLIDO, ' ', PRIMER_NOMBRE, ' ', SEGUNDO_NOMBRE) AS N 
	FROM CANDIDATOS WHERE ID_CANDIDATO LIKE E.ID_CANDIDATO) AS NOMBRE, 
	E.ID_CANDIDATO, E.ID_EVALUACION, E.FOLIO, E.TIPO_EVALUACION, E.MOTIVO_EVALUACION, E.MODO_EVALUACION, 
	(SELECT NUM_OFICIO FROM OFICIOS WHERE ID_EVALUACION LIKE E.ID_EVALUACION) AS NUM_OFICIO, 
	(SELECT DEPENDENCIA FROM OFICIOS WHERE ID_EVALUACION LIKE E.ID_EVALUACION) AS DEPENDENCIA, 
	(SELECT ADSCRIPCION FROM OFICIOS WHERE ID_EVALUACION LIKE E.ID_EVALUACION) AS ADSCRIPCION, 
	(SELECT CORPORACION FROM OFICIOS WHERE ID_EVALUACION LIKE E.ID_EVALUACION) AS CORPORACION, 
	(SELECT PUESTO FROM OFICIOS WHERE ID_EVALUACION LIKE E.ID_EVALUACION) AS PUESTO, 
	(SELECT FECHA FROM OFICIOS WHERE ID_EVALUACION LIKE E.ID_EVALUACION) AS FECHA 
	FROM EVALUACION E WHERE E.FOLIO LIKE '%s'", $PARAM);
	break;
	case 1:
	// Oficio
	$query = sprintf("SELECT C.ID_CANDIDATO, CONCAT(C.PRIMER_APELLIDO,' ',C.SEGUNDO_APELLIDO,' ',C.PRIMER_NOMBRE,' ',C.SEGUNDO_NOMBRE) AS NOMBRE, E.FOLIO, E.TIPO_EVALUACION, E.MOTIVO_EVALUACION, E.MODO_EVALUACION, O.*
		FROM candidatos C 
        INNER JOIN oficios O ON (C.ID_CANDIDATO = O.ID_CANDIDATO)
        INNER JOIN evaluacion E ON (O.ID_EVALUACION = E.ID_EVALUACION)
		WHERE O.NUM_OFICIO LIKE '%s'
		ORDER BY NOMBRE DESC", $PARAM);
	break;
	case 2:
		$query = sprintf("SELECT C.ID_CANDIDATO, CONCAT(C.PRIMER_APELLIDO,' ',C.SEGUNDO_APELLIDO,' ',C.PRIMER_NOMBRE,' ',C.SEGUNDO_NOMBRE) AS NOMBRE, E.FOLIO, E.TIPO_EVALUACION, E.MOTIVO_EVALUACION, E.MODO_EVALUACION, O.*
		FROM candidatos C 
		INNER JOIN oficios O ON (C.ID_CANDIDATO = O.ID_CANDIDATO)
		INNER JOIN evaluacion E ON (O.ID_EVALUACION = E.ID_EVALUACION)
		WHERE '%s' IN ( 
		CONCAT(C.PRIMER_APELLIDO, ' ', C.SEGUNDO_APELLIDO, ' ', C.PRIMER_NOMBRE, ' ', C.SEGUNDO_NOMBRE),
		CONCAT(C.PRIMER_NOMBRE, ' ', C.SEGUNDO_NOMBRE, ' ', C.PRIMER_APELLIDO, ' ', C.SEGUNDO_APELLIDO), 
		CONCAT(C.PRIMER_APELLIDO, ' ', C.SEGUNDO_APELLIDO, ' ', C.PRIMER_NOMBRE),
		CONCAT(C.PRIMER_APELLIDO, ' ', C.SEGUNDO_APELLIDO, ' ', C.SEGUNDO_NOMBRE),
		CONCAT(C.PRIMER_NOMBRE, ' ', C.PRIMER_APELLIDO, ' ', C.SEGUNDO_APELLIDO),
		CONCAT(C.SEGUNDO_NOMBRE, ' ', C.PRIMER_APELLIDO, ' ', C.SEGUNDO_APELLIDO),
		CONCAT(C.PRIMER_NOMBRE, ' ', C.SEGUNDO_NOMBRE, ' ', C.PRIMER_APELLIDO),
		CONCAT(C.PRIMER_NOMBRE, ' ', C.SEGUNDO_NOMBRE, ' ', C.SEGUNDO_APELLIDO),
		CONCAT(C.PRIMER_NOMBRE, ' ', C.PRIMER_APELLIDO),
		CONCAT(C.PRIMER_NOMBRE, ' ', C.SEGUNDO_APELLIDO), 
		CONCAT(C.PRIMER_APELLIDO, ' ', C.PRIMER_NOMBRE)
		)
		AND E.ESTATUS LIKE 0
		ORDER BY NOMBRE DESC;", $PARAM);
	break;
}
$conexion = new MySqlConnect($db, $user, $pswd); 
$conexion->executeSelectQuery($query, TRUE);
$conexion->closeMySqlConnection();
?>