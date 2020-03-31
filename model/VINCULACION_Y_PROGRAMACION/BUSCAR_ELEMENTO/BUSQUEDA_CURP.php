<?php
header("Content-type: text/html; charset=utf8");
//header('Content-type:application/json');
require("../../conexion.php"); 

error_reporting(0);
 
$CURP = $_POST['CURP'];

if($DOCUMENTO_ORIGEN == NULL){

	 $DOCUMENTO_ORIGEN = $DOCUMENTO_ORIGEN0 = $_POST['OFICIO'];
}



$conexion->set_charset("utf8");

$myArray = array();
if (empty($CURP)) {

	print_r("sin curp");
	
}
else{
	if ($result = $conexion->query("SELECT COUNT(*) FROM CANDIDATOS  WHERE CURP = '$CURP' ")) {

		$row = mysqli_fetch_array($result);

		
			//echo sprintf("INSERT INTO oficios VALUES(%s, %s)", "$DOCUMENTO_ORIGEN", "SELECT ID_CANDIDATO FROM CANDIDATOS  WHERE CURP = '$CURP'");

			$sql = ("INSERT INTO oficios VALUES('$DOCUMENTO_ORIGEN', (SELECT ID_CANDIDATO FROM CANDIDATOS  WHERE CURP = '$CURP'),NULL, NULL, NULL)");
				$conexion->set_charset("utf8");
				if (mysqli_query($conexion,$sql)  === TRUE) {
			   	 	echo " true";
				} else {
			    	echo " false";
			  }
		
		print_r($row[0]);
		echo $DOCUMENTO_ORIGEN0;
	}
}



$conexion -> close();
?>