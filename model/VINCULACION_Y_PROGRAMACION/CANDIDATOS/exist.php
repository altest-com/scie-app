<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];

   $resultado = mysqli_query($conexion,"SELECT ID_CANDIDATO FROM CANDIDATOS WHERE ID_CANDIDATO = '$ID_CANDIDATO'");
   $exist=mysqli_fetch_array($resultado);
    
   if($exist[0] === NULL)  echo "No existe";
   
   else echo "Existe";

	$conexion->set_charset("utf8");


$conexion->close();

?>