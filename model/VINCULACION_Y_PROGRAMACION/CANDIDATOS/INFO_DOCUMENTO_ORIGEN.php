<?php
header("Content-type: text/html; charset=utf8");
include ("../../MySqlConnect.php");
include ("../../conection.php");
$conexion = new MySqlConnect($db, $user, $pswd); 
$DOCUMENTO_ORIGEN = $_POST['DOCUMENTO_ORIGEN'];
$CORPORACION = $_POST['CORPORACION'];
$ANIO = $_POST['FECHA'];

if (isset($DOCUMENTO_ORIGEN) && isset($CORPORACION) && isset($ANIO))
{
	$query = sprintf("SELECT candidatos.ID_CANDIDATO, CONCAT(PRIMER_APELLIDO,' ',SEGUNDO_APELLIDO,' ',PRIMER_NOMBRE,' ',SEGUNDO_NOMBRE) AS NOMBRE, candidatos.CURP
		FROM candidatos INNER JOIN oficios ON (candidatos.ID_CANDIDATO = oficios.ID_CANDIDATO)
		WHERE oficios.NUM_OFICIO = '%s' AND oficios.DEPENDENCIA = '%s' AND oficios.FECHA = '%s' AND oficios.ID_EVALUACION IS NULL
		ORDER BY NOMBRE DESC", $DOCUMENTO_ORIGEN, $CORPORACION, $ANIO);

	$conexion->executeSelectQuery($query, TRUE);
}
else
{
	echo "Solicitud no procesada 0x00001";
}
$conexion->closeMySqlConnection();
?>