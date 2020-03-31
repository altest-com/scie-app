<?php
include_once "ConexionBD.php";

$DEPARTAMENTO = $_POST['DEPARTAMENTO'];
$FECHA1 = $_POST['FECHA1'];
$FECHA2 = $_POST['FECHA2'];

		$cone = conectarBD();
		
		echo Resultado11($cone,$DEPARTAMENTO, $FECHA1,$FECHA2)."-".Resultado12($cone,$DEPARTAMENTO, $FECHA1,$FECHA2)."-".Resultado13($cone,$DEPARTAMENTO, $FECHA1,$FECHA2)."-".Resultado14($cone,$DEPARTAMENTO, $FECHA1,$FECHA2)."-".Resultado15($cone,$DEPARTAMENTO, $FECHA1,$FECHA2)."-".Resultado16($cone,$DEPARTAMENTO, $FECHA1,$FECHA2)."-".Resultado17($cone,$DEPARTAMENTO, $FECHA1,$FECHA2);
?>