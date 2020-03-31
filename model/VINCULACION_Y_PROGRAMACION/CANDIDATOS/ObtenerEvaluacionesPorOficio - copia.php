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
	$query = sprintf("SELECT C.ID_CANDIDATO, CONCAT(C.PRIMER_APELLIDO,' ',C.SEGUNDO_APELLIDO,' ',C.PRIMER_NOMBRE,' ',C.SEGUNDO_NOMBRE) AS NOMBRE, E.FOLIO, E.TIPO_EVALUACION, E.MOTIVO_EVALUACION, E.MODO_EVALUACION, O.*
		FROM candidatos C 
		INNER JOIN oficios O ON (C.ID_CANDIDATO = O.ID_CANDIDATO)
		INNER JOIN evaluacion E ON (O.ID_EVALUACION = E.ID_EVALUACION)
		WHERE O.NUM_OFICIO LIKE (SELECT NUM_OFICIO FROM OFICIOS WHERE ID_EVALUACION LIKE (SELECT ID_EVALUACION FROM EVALUACION WHERE FOLIO LIKE '%s'))", $PARAM);
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
}
$conexion = new MySqlConnect($db, $user, $pswd); 
$conexion->executeSelectQuery($query, TRUE);
$conexion->closeMySqlConnection();
?>