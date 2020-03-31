<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");
include("ADDELEMENTO.php");


$sql = ("INSERT INTO oficios VALUES('$DOCUMENTO_ORIGEN','$ID_CANDIDATO')");
				$conexion->set_charset("utf8");
				if ($conexion->query($sql) === TRUE) {
			   	 	echo " true";
				} else {
			    	echo " false";
			  }

?>