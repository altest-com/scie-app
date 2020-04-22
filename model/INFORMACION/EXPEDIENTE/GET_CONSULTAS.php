<?php
error_reporting(0);
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php");

$ID_EXPEDIENTE = $_POST['ID_EXPEDIENTE'];

$conexion->set_charset("utf8");

if($result = $conexion->query("SELECT A.ID_CONSULTA AS ID_CONSULTA, CONSULTOR, FECHA FROM CONSULTA_INFORMACION AS A INNER JOIN CONSULTA_EXPEDIENTE AS B ON A.ID_CONSULTA=B.ID_CONSULTA WHERE ID_EXPEDIENTE='$ID_EXPEDIENTE'")){
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $myArray[] = $row;
    }
    //echo print_r($myArray);
    echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    $result -> close();
}
//Send an empty Json
$conexion -> close();
?>