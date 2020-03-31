<?php
header("Content-type: text/html; charset=utf8");
require("../../conexion.php"); 
error_reporting(0);

$conexion->set_charset("utf8");
$query = ("SELECT oficios.ID_OFICIO FROM oficios INNER JOIN evaluacion ON (oficios.ID_CANDIDATO = evaluacion.ID_CANDIDATO) WHERE evaluacion.AUTORIZACION IN ('001', '111')  GROUP BY oficios.ID_OFICIO");

$resultado = mysqli_query($conexion, $query);

$res = array();
$i=0;
while(($row = mysqli_fetch_array($resultado))){
    $res[] = $row[$i];
}
echo implode(", ", $res);
mysqli_free_result($result);

$conexion -> close();
?>