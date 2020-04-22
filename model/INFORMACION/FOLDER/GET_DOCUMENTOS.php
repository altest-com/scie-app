<?php
error_reporting(0);
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php");

$ID_FOLDER = $_POST['ID_FOLDER'];

$conexion->set_charset("utf8");

if($result = $conexion->query("SELECT A.ID_DOCUMENTO AS ID_DOCUMENTO, NOMBRE FROM DOCUMENTO_INFORMACION AS A INNER JOIN DOCUMENTO_FOLDER AS B ON A.ID_DOCUMENTO=B.ID_DOCUMENTO WHERE ID_FOLDER='$ID_FOLDER'")){
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