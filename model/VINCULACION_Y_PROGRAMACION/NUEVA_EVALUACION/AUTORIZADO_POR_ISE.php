<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");
error_reporting(0);

///ISE
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$OBSERVACIONES = $_POST['OBSERVACIONES'];


if($ID_EVALUACION == NULL){
	echo "Ingrese una Evaluacion";
}

else{ 


   $resultado = mysqli_query($conexion,"SELECT ID_CANDIDATO FROM evaluacion WHERE ID_EVALUACION = '$ID_EVALUACION'");
   $exist=mysqli_fetch_array($resultado); 
 	//echo $exist[0];



   $resultado2 = mysqli_query($conexion,"SELECT count(*) as ID_EVALUACION from evaluacion WHERE ID_CANDIDATO = '$exist[0]' ");
   $exist2=mysqli_fetch_array($resultado2); 
    //echo "<br>";
 	//echo  $exist2[0];

 	if($exist2[0] == 1)
 		{	
 		   $sql = ("UPDATE evaluacion SET AUTORIZACION = IF((SELECT NUM_OFICIO FROM OFICIOS WHERE ID_EVALUACION = evaluacion.ID_EVALUACION) = 'PERMANENCIA','PD','001'), OBSERVACIONES = '$OBSERVACIONES' WHERE ID_EVALUACION = '$ID_EVALUACION'");
				$conexion->set_charset("utf8");
				if ($conexion->query($sql) === TRUE) {
			   	 	echo "true";
				} else {
			    	echo "false";
			  }
 		}
 	else{ 
 			 $resultado3 = mysqli_query($conexion,"SELECT AUTORIZACION FROM evaluacion WHERE ID_EVALUACION = '$ID_EVALUACION' LIMIT 1");
  			 $eval=mysqli_fetch_assoc($resultado3); 
  			 $var = sprintf("%s", implode($eval));
  			 $var[2] = '1';
  			 //echo $var; 
 		    
 		     $sql = ("UPDATE evaluacion SET AUTORIZACION = IF((SELECT NUM_OFICIO FROM OFICIOS WHERE ID_EVALUACION = evaluacion.ID_EVALUACION) = 'PERMANENCIA','PD','$var'), OBSERVACIONES = '$OBSERVACIONES' WHERE ID_EVALUACION = '$ID_EVALUACION'");
				$conexion->set_charset("utf8");
				if ($conexion->query($sql) === TRUE) {
			   	 	echo "true";
				} else {
			    	echo "false";
			  }


 		//  echo $rest2;
 		//  echo $rest;

 		 
 	

 		}
 }

$conexion->close();
?>