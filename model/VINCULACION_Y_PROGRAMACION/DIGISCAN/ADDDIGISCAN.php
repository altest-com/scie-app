<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$CURP = $_POST['CURP'];
$DIGISCAN = $_POST['DIGISCAN'];
$TELESCAN = $_POST['TELESCAN'];
$FECHA = $_POST['FECHA'];
$DOCUMENTO_DE_IDENTIFICACION = $_POST['DOCUMENTO_DE_IDENTIFICACION'];
$NO_DE_DOCUMENTO  = $_POST['NO_DE_DOCUMENTO'];
$C_IDENTIFICACION = $_POST['C_IDENTIFICACION'];
$CIB = $_POST['CIB'];
$TIPO_REGISTRO = $_POST['TIPO_REGISTRO'];
$INFORMACION_DE_CONTACTO = $_POST['INFORMACION_DE_CONTACTO'];
$PELIGROSIDAD = $_POST['PELIGROSIDAD'];
$ARCHIVO = $_POST['ARCHIVO'];

$sqlDel = ("DELETE FROM digiscan WHERE ID_EVALUACION = '$ID_EVALUACION'");
$conexion->set_charset("utf8");

	if ($conexion->query($sqlDel) === TRUE) {
   	 	echo "true";
	} else {
    	echo "false";
}

/*$sqlDel = ("DELETE FROM fotografias WHERE ID_EVALUACION = '$ID_EVALUACION'");
$conexion->set_charset("utf8");

	if ($conexion->query($sqlDel) === TRUE) {
   	 	echo "true";
	} else {
    	echo "false";
}*/


$sql = ("INSERT INTO digiscan VALUES('$ID_CANDIDATO', '$ID_EVALUACION', '$CURP', '$DIGISCAN', '$FECHA', '$DOCUMENTO_DE_IDENTIFICACION', '$NO_DE_DOCUMENTO', '$C_IDENTIFICACION', '$CIB', '$TIPO_REGISTRO', '$INFORMACION_DE_CONTACTO', '$PELIGROSIDAD','$ARCHIVO', '$TELESCAN')");

	$conexion->set_charset("utf8");

	if ($conexion->query($sql) === TRUE) {
   	 	echo "true";
	} else {
    	echo "false";
}
$conexion->close();

?>