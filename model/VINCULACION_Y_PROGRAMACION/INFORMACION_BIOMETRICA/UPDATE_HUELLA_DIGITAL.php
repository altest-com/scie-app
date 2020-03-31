<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");

$ID_CANDIDATO = $_REQUEST['ID_CANDIDATO'];



if ($result = $conexion->query(sprintf("SELECT CURP FROM candidatos WHERE ID_CANDIDATO = \"%s\" ",$ID_CANDIDATO))) {

		$row = mysqli_fetch_array($result);

		if($row[0] !== NULL){
			//echo sprintf("%s", $row[0]);
		
		}
		else{
			echo "false";
		}

}


$sql = ("UPDATE candidatos SET HUELLA_DIGITAL = '$row[0]' WHERE ID_CANDIDATO = '$ID_CANDIDATO'");

	$conexion->set_charset("utf8");

	if ($conexion->query($sql) === TRUE) {
   	 	echo "true";
	} else {
    	echo "false";
}
$conexion->close();

?>