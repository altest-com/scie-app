<?php
include_once "ConexionBD.php";

$DEPARTAMENTO = $_POST['DEPARTAMENTO'];
$FECHA1 = $_POST['FECHA1'];
$FECHA2 = $_POST['FECHA2'];

		$cone = conectarBD();
		
		echo Resultado01($cone,$DEPARTAMENTO, $FECHA1,$FECHA2)."-".Resultado02($cone,$DEPARTAMENTO, $FECHA1,$FECHA2)."-".Resultado03($cone,$DEPARTAMENTO, $FECHA1,$FECHA2)."-".Resultado04($cone,$DEPARTAMENTO, $FECHA1,$FECHA2)."-".Resultado05($cone,$DEPARTAMENTO, $FECHA1,$FECHA2);
?>