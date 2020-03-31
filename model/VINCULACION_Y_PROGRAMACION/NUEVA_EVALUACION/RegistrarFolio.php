<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
include ("../../conection.php"); 
include ("../../MySqlConnect.php");

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];

$conexion = new MySqlConnect($db, $user, $pswd);
if (isset($ID_CANDIDATO))
{
    $queryFolio = sprintf("SELECT FOLIO FROM EVALUACION WHERE FOLIO REGEXP('^[0-9]{2}-[0-9]{4}$') ORDER BY FOLIO DESC LIMIT 1;");
    $folio = $conexion->getValueFromQuery($queryFolio, "FOLIO");
    $folio = ((int)substr($folio, 3, 4)) + 1;
    $folio = sprintf("%d-%04d", date("y", time()), $folio);
    $queryUpdateFolio = sprintf("UPDATE EVALUACION SET FOLIO = '%s' WHERE ID_CANDIDATO LIKE '%s' AND (FOLIO = '-' OR FOLIO = '' OR FOLIO IS NULL AND EVALUACION_DERIVADA_DE IS NULL OR EVALUACION_DERIVADA_DE LIKE '');", $folio, $ID_CANDIDATO);
    $conexion->executeInsertQuery($queryUpdateFolio);
    echo "Folio: ".$folio;
}

$conexion -> closeMySqlConnection();
?>