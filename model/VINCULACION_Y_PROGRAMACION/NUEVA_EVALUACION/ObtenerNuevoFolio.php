<?php
{
    include ("../../MySqlConnect.php");
    include ("../../conection.php");

    $conexion = new MySqlConnect($db, $user, $pswd);
    $query = sprintf("SELECT FOLIO FROM EVALUACION WHERE FOLIO REGEXP('^[0-9]{2}-[0-9]{4}$') ORDER BY FOLIO DESC LIMIT 1;");
    $folio = $conexion->getValueFromQuery($query, "FOLIO");
    $folio = ((int)substr($folio, 3, 4)) + 1;
    $year = date("y", time());
    $folio = sprintf("%d-%04d", $year, $folio);
    echo $folio;
    $conexion->closeMySqlConnection();
}
?>