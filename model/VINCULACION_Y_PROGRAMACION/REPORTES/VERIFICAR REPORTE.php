<?php
include_once "ConexionBD.php";

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$DEPARTAMENTO = $_POST['DEPARTAMENTO'];

		$cone = conectarBD();
		$lol = Verificar_reportes($cone,$ID_CANDIDATO, $ID_EVALUACION,$DEPARTAMENTO);
		
		echo $lol;

?>