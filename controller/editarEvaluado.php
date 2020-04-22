<?php
include ("../model/Evaluado.php");
$data = $_POST['myData'];
error_reporting(0);
if (isset($data) && !empty($data)) {
    $datos = json_decode($data);
    $evaluado = new Evaluado($datos->{'id'});
    $evaluado->updateEvaluado($datos->{'nombre'}, $datos->{'primer_apellido'}, $datos->{'segundo_apellido'}, $datos->{'curp'}, $datos->{'rfc'}, $datos->{'id_genero'}, $datos->{'fecha_creacion'}, $datos->{'estatus'});
}
