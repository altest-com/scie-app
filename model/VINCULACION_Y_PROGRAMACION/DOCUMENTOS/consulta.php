<?php
include("../../conexion.php");



	$resultado = mysqli_query($conexion,"SELECT COUNT(*) AS id FROM documentos ");
	    $line=mysqli_fetch_array($resultado);
	
	echo (int)$line[0] +1;
?>