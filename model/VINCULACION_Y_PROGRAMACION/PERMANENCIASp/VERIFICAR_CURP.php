<?php
include_once "ConexionBD.php";

$CURP = $_POST['CURP'];
$TIPO = $_POST['TIPO'];

		$cone = conectarBD();
		if($TIPO == "1"){
			$lol = Verificar_candidato($cone,$CURP);
		}
		else{
			$lol = Verificar_curp($cone,$CURP);
		}
		
		
		echo $lol;
?>