<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
include ("../../conection.php"); 
include ("../../MySqlConnect.php");

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ESQUEMA = $_POST['ESQUEMA'];

$conexion = new MySqlConnect($db, $user, $pswd);
if (isset($ID_CANDIDATO))
{
    $queryFolio = sprintf("SELECT FOLIO FROM EVALUACION WHERE FOLIO REGEXP('^[0-9]{2}-[0-9]{4}$') ORDER BY FOLIO DESC LIMIT 1;");
    $folio = $conexion->getValueFromQuery($queryFolio, "FOLIO");
    $folio = ((int)substr($folio, 3, 4)) + 1;
    $folio = sprintf("%d-%04d", date("y", time()), $folio);
    $queryUpdateFolio = sprintf("UPDATE EVALUACION SET FOLIO = '%s', MODO_EVALUACION = '%s', AUTORIZACION = 'FF' WHERE ID_CANDIDATO LIKE '%s' AND (FOLIO = '-' OR FOLIO = '' OR FOLIO IS NULL);", $folio, $ESQUEMA, $ID_CANDIDATO);
    $conexion->executeInsertQuery($queryUpdateFolio);
    echo "Folio: ".$folio;
}

$conexion -> closeMySqlConnection();
?>