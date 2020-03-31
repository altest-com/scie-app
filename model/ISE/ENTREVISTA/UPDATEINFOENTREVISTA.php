<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$DIAGNOSTICO_PRELIMINAR = $_POST['DIAGNOSTICO_PRELIMINAR'];
$SINTESIS_TECNICA = $_POST['SINTESIS_TECNICA'];

$sqlCommand = sprintf("UPDATE ENTREVISTA SET ENTREVISTA.DIAGNOSTICO_PRELIMINAR = %s, ENTREVISTA.SINTESIS_TECNICA = %s WHERE ENTREVISTA.ID_EVALUACION = %s AND ENTREVISTA.ID_CANDIDATO = %s", 
    $DIAGNOSTICO_PRELIMINAR, $SINTESIS_TECNICA, $ID_EVALUACION, $ID_CANDIDATO);

$conexion->set_charset("utf8");
if ($conexion->query($sqlCommand) === TRUE ){
    echo "true";
}
else{
    echo "false";
}
$conexion->close();
?>