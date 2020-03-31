<?php
include_once "ConexionBD.php";

$DEPARTAMENTO = $_POST['DEPARTAMENTO'];
$FECHA1 = $_POST['FECHA1'];
$FECHA2 = $_POST['FECHA2'];

		$cone = conectarBD();
		
		echo Resultado11_EV($cone,$DEPARTAMENTO, $FECHA1,$FECHA2)."-".Resultado12_EV($cone,$DEPARTAMENTO, $FECHA1,$FECHA2)."-".Resultado13_EV($cone,$DEPARTAMENTO, $FECHA1,$FECHA2)."-".Resultado14_EV($cone,$DEPARTAMENTO, $FECHA1,$FECHA2)."-".Resultado15_EV($cone,$DEPARTAMENTO, $FECHA1,$FECHA2)."-".Resultado16_EV($cone,$DEPARTAMENTO, $FECHA1,$FECHA2)."-".Resultado17_EV($cone,$DEPARTAMENTO, $FECHA1,$FECHA2);
?>