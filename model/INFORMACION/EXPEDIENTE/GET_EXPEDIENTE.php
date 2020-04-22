<?php
error_reporting(0);
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php");

$ID_EVALUACION = $_POST['ID_EVALUACION'];

$conexion->set_charset("utf8");

if($result = $conexion->query("SELECT ID_EXPEDIENTE FROM SIIEC.EXPEDIENTE_INFORMACION WHERE ID_EVALUACION='$ID_EVALUACION'")){
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $myArray[] = $row;
    }
    //echo print_r($myArray);
    echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    $result -> close();
}
//Export an empty Json
$conexion -> close();
?>