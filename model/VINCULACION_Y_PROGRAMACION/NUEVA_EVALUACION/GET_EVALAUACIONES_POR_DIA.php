<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");


$TIPO_EXAMEN = $_POST['TIPO_EXAMEN'];
$FECHA = $_POST['FECHA'];
$EXAMEN = '';

if ($TIPO_EXAMEN == 1)//Exaneb toxicologico
{
	$EXAMEN = 'FECHA_EXAMEN_TOXICOLOGICO';
}
else if ($TIPO_EXAMEN == 2)//Exaneb toxicologico
{
	$EXAMEN = 'FECHA_ISE_DOCUMENTOS';
}
else if ($TIPO_EXAMEN == 3)//Exaneb toxicologico
{
	$EXAMEN = 'FECHA_ISE_ENTREVISTA';
}
else if ($TIPO_EXAMEN == 4)//Exaneb toxicologico
{
	$EXAMEN = 'FECHA_EXAMEN_PSICOLOGICO';
}
else if ($TIPO_EXAMEN == 5)//Exaneb toxicologico
{
	$EXAMEN = 'FECHA_EXAMEN_MEDICO';
}
else if ($TIPO_EXAMEN == 6)//Exaneb toxicologico
{
	$EXAMEN = 'FECHA_EXAMEN_POLIGRAFICO';
}

	if ($result = $conexion->query("SELECT COUNT(*) FROM EVALUACION WHERE $EXAMEN = '$FECHA'")) {

		$row = mysqli_fetch_array($result);

		if($row[0] < 20){
			echo "true";
		
		}
		else{
			echo "false";
		}



	}
$conexion->close();

?>