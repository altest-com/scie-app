<?php
include_once "ConexionBD.php";

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
	
		$cone = conectarBD();
		$lol = contar_fotos($cone,$ID_CANDIDATO, $ID_EVALUACION);
		

		if($lol==0){
			return "incorrecto";
		}
		elseif ($lol>=5) {
			return "maximo";
		}
		else{
			return "correcto";
		}
	
?>