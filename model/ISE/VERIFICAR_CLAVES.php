<?php
include_once "ConexionBD.php";

$FECHA = $_POST['FECHA'];

		$cone = conectarBD();
		$lol = Verificar_claves($cone,$FECHA);
		
		echo $lol;
?>