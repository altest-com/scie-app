<?php
include_once "ConexionBD.php";

$DEPARTAMENTO = $_POST['DEPARTAMENTO'];
$FECHA1 = $_POST['FECHA1'];
$FECHA2 = $_POST['FECHA2'];

		$cone = conectarBD();
		
		echo Resultado21($cone,$DEPARTAMENTO, $FECHA1,$FECHA2)."-".Resultado22($cone,$DEPARTAMENTO, $FECHA1,$FECHA2)."-".Resultado23($cone,$DEPARTAMENTO, $FECHA1,$FECHA2)."-".Resultado24($cone,$DEPARTAMENTO, $FECHA1,$FECHA2)."-".Resultado25($cone,$DEPARTAMENTO, $FECHA1,$FECHA2);
?>