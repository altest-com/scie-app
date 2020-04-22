<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conection.php");
include("../../MySqlConnect.php");

$OFICIO = $_POST['OFICIO'];

    $sql = sprintf("SELECT COUNT(*) AS CANTIDAD FROM EVALUACION E INNER JOIN EXPEDIENTE_INFORMACION EI ON (E.ID_EVALUACION = EI.ID_EVALUACION) INNER JOIN NOTIFICACION_HISTORIAL N ON (EI.ID_EXPEDIENTE = N.ID_EXPEDIENTE)
    WHERE N.OFICIO LIKE '%s';", $OFICIO);
    $conexion = new MySqlConnect($db, $user, $pswd);
    $cantidadDeExpedientes = (int)($conexion -> GetValueFromQuery($sql, "CANTIDAD"));
    if ($cantidadDeExpedientes == 0)
    {
        echo "[]";
    }
    else
    {
        $sqlExpedientes = sprintf("SELECT E.FOLIO, E.ID_EVALUACION, E.ID_CANDIDATO, N.OFICIO, N.MOTIVO
        FROM EVALUACION E INNER JOIN EXPEDIENTE_INFORMACION EI ON (E.ID_EVALUACION = EI.ID_EVALUACION) INNER JOIN NOTIFICACION_HISTORIAL N ON (EI.ID_EXPEDIENTE = N.ID_EXPEDIENTE)
        WHERE N.OFICIO LIKE '%s' 
        ORDER BY E.FOLIO;", $OFICIO);
        $conexion->executeSelectQuery($sqlExpedientes, TRUE);
    }
    $conexion->close();
    
?>