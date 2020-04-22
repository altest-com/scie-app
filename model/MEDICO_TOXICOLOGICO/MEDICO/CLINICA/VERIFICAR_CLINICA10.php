<?php
include_once "../ConexionBD.php";

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];

		$cone = conectarBD();
		$lol = Verificar_clinica10($cone,$ID_CANDIDATO, $ID_EVALUACION);
		
		echo $lol;
?>