<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");
error_reporting(0);

///ISE
$ID_EVALUACION = $_POST['ID_EVALUACION'];


if($ID_EVALUACION == NULL){
	echo "Ingrese una Evaluacion";
}

else{ 
///ISE
$ID_EVALUACION = $_POST['ID_EVALUACION'];

   $resultado = mysqli_query($conexion,"SELECT ID_CANDIDATO FROM evaluacion WHERE ID_EVALUACION = '$ID_EVALUACION'");
   $exist=mysqli_fetch_array($resultado); 
 	//echo $exist[0];



   $resultado2 = mysqli_query($conexion,"SELECT count(*) as ID_EVALUACION from evaluacion WHERE ID_CANDIDATO = '$exist[0]' ");
   $exist2=mysqli_fetch_array($resultado2); 
    //echo "<br>";
 	//echo  $exist2[0];

 			 $resultado3 = mysqli_query($conexion,"SELECT AUTORIZACION FROM evaluacion WHERE ID_EVALUACION = '$ID_EVALUACION'");
  			 $eval=mysqli_fetch_array($resultado3); 

  			 //echo $eval[0];
 		    
 			
 			$rest2 = substr($eval[0], 1, 1);  // devuelve "cde"

 			$rest3 = 1;

 		    $rest = "1";

 		     $sql = ("UPDATE evaluacion SET AUTORIZACION = '$rest3$rest$rest2' WHERE ID_EVALUACION = '$ID_EVALUACION'");
				$conexion->set_charset("utf8");
				if ($conexion->query($sql) === TRUE) {
			   	 	echo "true";
				} else {
			    	echo "false";
			  }


 		//  echo $rest2;
 		//  echo $rest;
 
 	}

$conexion->close();
?>