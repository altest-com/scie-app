<?php
include_once "ConexionBD.php";

		$cone = conectarBD();

		setlocale(LC_ALL,"es_ES.UTF-8");
        $time = time();
        //$fecha = date("Y-m-d H:i:s", $time);
        $FECHA = date("Y-m-d", $time);

		$lol = Verificar_DESCARGA($cone,$FECHA);
		
		echo $lol;
?>