<?php
header("Content-type: text/html; charset=utf8");
include ("../../MySqlConnect.php");
include ("../../conection.php");
$fecha = $_POST['FECHA'];
$area = $_POST['AREA'];
if (isset($fecha))
{
    $conexion = new MySqlConnect($db, $user, $pswd);
    $query = sprintf("SELECT DISTINCT COUNT(EVALUACION.ID_CANDIDATO) AS ROW FROM EVALUACION WHERE '%s' 
    IN (DATE(%s));", $fecha, $area);
    $dep = "";
    if (strcmp($area, "FECHA_EXAMEN_TOXICOLOGICO") == 0) {
        $dep = "TOX";
    }
    else if (strcmp($area, "FECHA_EXAMEN_PSICOLOGICO") == 0) {
        $dep = "PSI";
    }
    else if (strcmp($area, "FECHA_ISE_DOCUMENTOS") == 0 || strcmp($area, "FECHA_ISE_ENTREVISTA") == 0) {
        $dep = "ISE";
    }
    else if (strcmp($area, "FECHA_EXAMEN_MEDICO") == 0) {
        $dep = "MED";
    }
    else if (strcmp($area, "FECHA_EXAMEN_POLIGRAFICO") == 0) {
        $dep = "POL";
    }

    
    $usados = (int)$conexion->getSingleValueFromQuery($query);
    $totales = (int)$conexion->getValueFromQuery(sprintf("SELECT %s FROM LUGARES_DISPONIBLES;", $dep), $dep);
    $disponibles = $totales - $usados;

    echo $usados.",".$disponibles;
}
else
{
    echo "0,20";
}
?>