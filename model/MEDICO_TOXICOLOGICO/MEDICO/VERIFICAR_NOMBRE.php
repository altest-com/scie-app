<?php
include_once "ConexionBD.php";

$NOMBRE = $_POST['NOMBRE'];

		$cone = conectarBD();
		$lol = Verificar_nombre($cone,$NOMBRE.".jpg");
		
		echo $lol;
?>