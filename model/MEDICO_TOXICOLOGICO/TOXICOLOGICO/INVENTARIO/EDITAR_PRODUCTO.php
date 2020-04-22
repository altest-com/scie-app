<?php
header("Content-type: text/html; charset=utf8");
require("../../../conexion.php");
include_once "ConexionBD.php"; 

$ID = $_POST['ID'];
$PROVEEDOR = $_POST['PROVEEDOR'];
$DOCUMENTO = $_POST['DOCUMENTO'];
$CADUCIDAD = $_POST['CADUCIDAD'];
/*"INSERT INTO ASISTENCIA VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$PRUEBA' ,'$FECHA', '$ASISTENCIA')"*/
		
		$conexion->set_charset("utf8");
		$cone = conectarBD();
		$ID2 = ID($cone, $ID);
		$sqlUpdate = "UPDATE toxicologia_productos_historial SET PROVEEDOR = '$PROVEEDOR', DOCUMENTO='$DOCUMENTO', CADUCIDAD = '$CADUCIDAD' WHERE ID = '$ID'";
			if ($conexion->query($sqlUpdate) === TRUE) {
		   	 	echo "true";
			} 
			else {
		    	echo "false";
			}
			

			$sqlInsert = "UPDATE toxicologia_caducidad SET FECHA = '$CADUCIDAD' WHERE ID = '$ID2'";
			if ($conexion->query($sqlInsert) === TRUE) {
		   	 	echo "true";
			} 
			else {
		    	echo "false";
			}
			
		

$conexion->close();

?>