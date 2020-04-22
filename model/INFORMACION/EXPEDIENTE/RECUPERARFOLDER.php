<?php
error_reporting(0);
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php");

$ID_EXPEDIENTE = $_POST['ID_EXPEDIENTE'];
$NOMBRE_FOLDER = $_POST['NOMBRE_FOLDER'];

$conexion->set_charset("utf8");

if($result = $conexion->query("SELECT FOLDER.ID_FOLDER AS ID_FOLDER, NOMBRE FROM FOLDER_INFORMACION AS FOLDER
INNER JOIN FOLDER_EXPEDIENTE AS EXPEDIENTE ON FOLDER.ID_FOLDER=EXPEDIENTE.ID_FOLDER WHERE ID_EXPEDIENTE='$ID_EXPEDIENTE' AND
 NOMBRE='$NOMBRE_FOLDER'")){
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