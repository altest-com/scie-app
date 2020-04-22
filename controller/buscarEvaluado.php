<?php
include ("../core/BaseEntity.php");
error_reporting(0);
$tablaEvaluados = new BaseEntity("evaluados");
$resultArray = $tablaEvaluados->getAll();
echo json_encode($resultArray, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
