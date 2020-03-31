<?php
header("Content-type: text/html; charset=utf8");
require("../../conexion.php"); 

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];


   $sql = mysqli_query($conexion,"SELECT ID_CANDIDATO FROM candidatos_no_evaluables WHERE ID_CANDIDATO = '$ID_CANDIDATO'");
   $exist=mysqli_fetch_array($sql);
    
   if($exist[0] !== NULL)  
   	echo "true";
   
   else 
   	echo"false";

$conexion->close();

?>