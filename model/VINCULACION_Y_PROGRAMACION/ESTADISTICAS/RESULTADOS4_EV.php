<?php
include_once "ConexionBD.php";

$DEPARTAMENTO = $_POST['DEPARTAMENTO'];
$FECHA1 = $_POST['FECHA1'];
$FECHA2 = $_POST['FECHA2'];

		$cone = conectarBD();
		
		echo Resultado01_EV($cone,$DEPARTAMENTO, $FECHA1,$FECHA2)."-".Resultado02_EV($cone,$DEPARTAMENTO, $FECHA1,$FECHA2)."-".Resultado03_EV($cone,$DEPARTAMENTO, $FECHA1,$FECHA2)."-".Resultado04_EV($cone,$DEPARTAMENTO, $FECHA1,$FECHA2)."-".Resultado05_EV($cone,$DEPARTAMENTO, $FECHA1,$FECHA2)."-".Resultado06_EV($cone,$DEPARTAMENTO, $FECHA1,$FECHA2)."-".Resultado07_EV($cone,$DEPARTAMENTO, $FECHA1,$FECHA2);
?>