<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
include ("../../conection.php");
include ("../../MySqlConnect.php");
include_once "ConexionBD.php";
$fechaActual = $_POST['FECHA'];

$conexion = new MySqlConnect($db, $user, $pswd);
$query = sprintf(
    "UPDATE EVALUACION E SET 
    AUTORIZACION = 'PD', 
    FECHA_EXAMEN_TOXICOLOGICO = '0000-00-00 00:00:00', 
    FECHA_EXAMEN_POLIGRAFICO = '0000-00-00 00:00:00',
    FECHA_EXAMEN_PSICOLOGICO = '0000-00-00 00:00:00',
    FECHA_ISE_DOCUMENTOS = '0000-00-00 00:00:00',
    FECHA_ISE_ENTREVISTA = '0000-00-00 00:00:00',
    FECHA_EXAMEN_MEDICO = '0000-00-00 00:00:00'
    WHERE (EVALUACION_DERIVADA_DE LIKE '' OR EVALUACION_DERIVADA_DE IS NULL) 
    AND (FOLIO LIKE '-' OR FOLIO IS NULL) 
    AND TIPO_EVALUACION LIKE 'PERMANENCIA'
    AND '%s' /*$fechaActual*/
    IN (
        IF(E.EVALUACION_DERIVADA_DE !='',(DATE(E.FECHA_EXAMEN_POLIGRAFICO)),
        DATE(E.FECHA_EXAMEN_TOXICOLOGICO)),
        DATE(E.FECHA_EXAMEN_TOXICOLOGICO)
    );", $fechaActual
);
$cone =conectarBD();
$datos = Obtener_inasistencias($cone,$fechaActual);
echo $datos;

for($i = 0; $i < count($datos); $i++){
	
	$query2 = sprintf(
    "INSERT INTO inasistencias_mensuales VALUES('%s','%s','%s');",$datos[$i][0],$datos[$i][1], $fechaActual
	);
	$conexion->executeInsertQuery($query2);
    echo "\nregistro ".$i;
}


$conexion->executeInsertQuery($query);
if ((int)$conexion->getAffectedRows() > 0)
{
    echo $conexion->getAffectedRows();
    echo "true";
}
else 
{
    echo $conexion->getAffectedRows();
    echo "falseUpdated";
}
$conexion->closeMySqlConnection();
?>