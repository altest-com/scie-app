<?php
	header("Content-type: text/html; charset=utf8");
	include_once "ConexionBD.php"; 

	$cone = conectarBD();
	$lol = Verificar_caducidad($cone);
	if($lol == "incorrecto"){
		echo "incorrecto";
	}
	else{
		
		$var="";
		for ($i=0; $i < count($lol); $i++) { 
			$lol2 = produc_name($cone, $lol[$i][1]);
			$var=$var.$lol2[1]."_".$lol[$i][2]."_".$lol[$i][0]."*";
		}
		echo $var;

	}
?>