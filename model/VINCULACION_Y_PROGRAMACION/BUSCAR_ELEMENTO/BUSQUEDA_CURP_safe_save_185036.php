<?php
header("Content-type: text/html; charset=utf8");
//header('Content-type:application/json');
require("../../conexion.php"); 
 
$CURP = $_POST['CURP'];
$DOCUMENTO_ORIGEN = $_POST['OFICIO'];


$conexion->set_charset("utf8");

$myArray = array();
if (empty($CURP)) {

	print_r("sin curp");
	
}
else{
	if ($result = $conexion->query("SELECT COUNT(*) FROM CANDIDATOS  WHERE CURP = '$CURP' ")) {

		$row = mysqli_fetch_array($result);

		if($row[0] != 0){
			//echo sprintf("INSERT INTO oficios VALUES(%s, %s)", "$DOCUMENTO_ORIGEN", "SELECT ID_CANDIDATO FROM CANDIDATOS  WHERE CURP = '$CURP'");

			$sql = ("INSERT INTO oficios VALUES('$DOCUMENTO_ORIGEN', (SELECT ID_CANDIDATO FROM CANDIDATOS  WHERE CURP = '$CURP'))");
				$conexion->set_charset("utf8");
				if ($conexion->query($sql) === TRUE) {
			   	 	echo " true";
				} else {
			    	echo " false";
			  }


		}

		print_r($row[0]);


	}
}


//$result -> close();
$conexion -> close();
?>