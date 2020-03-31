<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");

$ID_EVALUACION = $_POST['ID_EVALUACION'];
$TIPO_EXAMEN = $_POST['TIPO_EXAMEN'];
$FECHA = $_POST['FECHA'];
$EXAMEN = "";

if ($TIPO_EXAMEN == 1)//Exaneb toxicologico
{
	$EXAMEN = "FECHA_EXAMEN_TOXICOLOGICO";
}
else if ($TIPO_EXAMEN == 2)//Exaneb toxicologico
{
	$EXAMEN = "FECHA_ISE_DOCUMENTOS";
}
else if ($TIPO_EXAMEN == 3)//Exaneb toxicologico
{
	$EXAMEN = "FECHA_ISE_ENTREVISTA";
}
else if ($TIPO_EXAMEN == 4)//Exaneb toxicologico
{
	$EXAMEN = "FECHA_EXAMEN_PSICOLOGICO";
}
else if ($TIPO_EXAMEN == 5)//Exaneb toxicologico
{
	$EXAMEN = "FECHA_EXAMEN_MEDICO";
}
else if ($TIPO_EXAMEN == 6)//Exaneb toxicologico
{
	$EXAMEN = "FECHA_EXAMEN_POLIGRAFICO";
}

$sql = ("UPDATE EVALUACION SET $EXAMEN = '$FECHA' WHERE ID_EVALUACION = '$ID_EVALUACION' ");

			$conexion->set_charset("utf8");

			if ($conexion->query($sql) === TRUE) {
		   	 	echo "true";
			} else {
		    	echo "false";
		}
$conexion->close();
?>