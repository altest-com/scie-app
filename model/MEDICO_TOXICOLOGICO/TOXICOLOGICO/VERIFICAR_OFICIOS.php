<?php
header("Content-type: text/html; charset=utf8");
include_once "ConexionBD.php";

$FECHA = $_POST['FECHA'];
$BITACORA = $_POST['BITACORA'];


		$cone = conectarBD();

		if($BITACORA == "1"){
			$lol = Verificar_oficio1($cone,$FECHA);
			echo $lol;
		}
		elseif($BITACORA == "2"){
			$lol = Verificar_oficio2($cone,$FECHA);
			echo $lol;
		}
		elseif($BITACORA == "3"){
			$lol = Verificar_oficio3($cone,$FECHA);
			echo $lol;
		}
		

?>