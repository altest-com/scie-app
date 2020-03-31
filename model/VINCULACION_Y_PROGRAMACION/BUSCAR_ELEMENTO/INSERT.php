<?php
header("Content-type: text/html; charset=utf8");
//header('Content-type:application/json');
require("../../conexion.php"); 
  
$CURP = $_POST['CURP'];
//$DOCUMENTO_ORIGEN0 = $_POST['OFICIO'];



			$sql = ("INSERT INTO oficios VALUES("$DOCUMENTO_ORIGEN", (SELECT ID_CANDIDATO FROM CANDIDATOS  WHERE CURP = '$CURP'))");
				$conexion->set_charset("utf8");
				if ($conexion->query($sql) === TRUE) {
			   	 	echo " true";
				} else {
			    	echo " false";
			  }



//$result -> close();
$conexion -> close();
?>