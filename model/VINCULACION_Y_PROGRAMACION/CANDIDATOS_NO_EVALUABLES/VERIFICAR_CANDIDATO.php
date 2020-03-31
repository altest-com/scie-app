<?php
include_once "ConexionBD.php";

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];


		$cone = conectarBD();
		$lol = Verificar_candidato($cone,$ID_CANDIDATO);
		
		echo $lol;
?>