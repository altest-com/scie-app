<?php
error_reporting(0);
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php");

$ID_EXPEDIENTE = $_POST['ID_EXPEDIENTE'];
$SALIDAS_DEVUELTAS=$_POST['SALIDAS_DEVUELTAS'];

$conexion->set_charset("utf8");

if($SALIDAS_DEVUELTAS === "True")
{
    if($result = $conexion->query("SELECT A.ID_SALIDA AS ID_SALIDA, NOMBRE, ASUNTO, DEPARTAMENTO, FECHA, FECHA_DEVOLUCION FROM SALIDAS_INFORMACION AS A INNER JOIN SALIDAS_EXPEDIENTE AS B ON A.ID_SALIDA=B.ID_SALIDA WHERE ID_EXPEDIENTE='$ID_EXPEDIENTE'")){
        while($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $myArray[] = $row;
        }
        //echo print_r($myArray);
        echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        $result -> close();
    }
}
else{
    if($result = $conexion->query("SELECT A.ID_SALIDA AS ID_SALIDA, NOMBRE, ASUNTO, DEPARTAMENTO, A.FECHA AS FECHA, FECHA_DEVOLUCION FROM SALIDAS_INFORMACION AS A INNER JOIN SALIDAS_EXPEDIENTE AS B ON A.ID_SALIDA=B.ID_SALIDA LEFT JOIN DEVOLUCION_INFORMACION AS C ON B.ID_SALIDA=C.ID_SALIDA WHERE ID_EXPEDIENTE='$ID_EXPEDIENTE' AND ID_DEVOLUCION IS NULL")){
        while($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $myArray[] = $row;
        }
        //echo print_r($myArray);
        echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        $result -> close();
    }
}
//Send an empty Json
$conexion -> close();
?>