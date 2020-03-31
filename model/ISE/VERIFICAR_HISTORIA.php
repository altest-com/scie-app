<?php
include_once "ConexionBD.php";

$ID_EVALUACION = $_POST['ID_EVALUACION'];

		$cone = conectarBD();
		$lol = Verificar_historia($cone,$ID_EVALUACION);
		
		echo $lol;
?>