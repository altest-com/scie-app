<?php
include_once "ConexionBD.php";

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
	
		$cone = conectarBD();
		$lol = contar_fotos($cone,$ID_CANDIDATO, $ID_EVALUACION);
		

		if($lol==0){
			echo "incorrecto";
		}
		elseif ($lol>=5) {
			echo "maximo";
		}
		else{
			echo "correcto";
		}
	
?>