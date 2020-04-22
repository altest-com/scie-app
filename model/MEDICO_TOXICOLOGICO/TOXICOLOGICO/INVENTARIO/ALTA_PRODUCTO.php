<?php
header("Content-type: text/html; charset=utf8");
require("../../../conexion.php");
include_once "ConexionBD.php"; 

$ID = $_POST['ID'];
$CANTIDAD = $_POST['CANTIDAD'];
$PROVEEDOR = $_POST['PROVEEDOR'];
$DOCUMENTO = $_POST['DOCUMENTO'];
$TIPO = $_POST['TIPO'];
$RAZON = $_POST['RAZON'];
$CADUCIDAD = $_POST['CADUCIDAD'];

$time = time();
$FECHA = date("Y-m-d", $time);


/*"INSERT INTO ASISTENCIA VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$PRUEBA' ,'$FECHA', '$ASISTENCIA')"*/
		
		$conexion->set_charset("utf8");

		if($TIPO==1){
			$sqlUpdate = "UPDATE toxicologia_productos SET CANTIDAD = CANTIDAD - '$CANTIDAD' WHERE ID_PRODUCTO = '$ID'";
			if ($conexion->query($sqlUpdate) === TRUE) {
		   	 	echo "true";
			} 
			else {
		    	echo "false";
			}

			$sqlInsert = "INSERT INTO toxicologia_productos_historial VALUES ('','$ID', '$CANTIDAD', '$PROVEEDOR','$FECHA' ,'$DOCUMENTO', '$TIPO', '$RAZON','$CADUCIDAD')";
			if ($conexion->query($sqlInsert) === TRUE) {
		   	 	echo "true";
			} 
			else {
		    	echo "false";
			}
			$conexion = conectarBD();
			CADUCIDAD($conexion, $ID,$CANTIDAD);
			
		}
		else{

			$sqlUpdate = "UPDATE toxicologia_productos SET CANTIDAD = CANTIDAD + '$CANTIDAD' WHERE ID_PRODUCTO = '$ID'";
			if ($conexion->query($sqlUpdate) === TRUE) {
		   	 	echo "true";
			} 
			else {
		    	echo "false";
			}

			$sqlInsert = "INSERT INTO toxicologia_productos_historial VALUES ('','$ID', '$CANTIDAD', '$PROVEEDOR','$FECHA' ,'$DOCUMENTO', '$TIPO', '$RAZON','$CADUCIDAD')";
			if ($conexion->query($sqlInsert) === TRUE) {
		   	 	echo "true";
			} 
			else {
		    	echo "false";
			}

			$sqlInsert = "INSERT INTO toxicologia_caducidad VALUES ('','$ID', '$CADUCIDAD', '$CANTIDAD','0')";
			if ($conexion->query($sqlInsert) === TRUE) {
		   	 	echo "true";
			} 
			else {
		    	echo "false";
			}
		}
		

$conexion->close();

?>