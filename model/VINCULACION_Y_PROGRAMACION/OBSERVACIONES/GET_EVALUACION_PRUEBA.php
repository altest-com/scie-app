<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");
//DE UNA EVALUACION PARA UNA PRUEBA

$PRUEBA = $_POST['PRUEBA'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];


if ($DEPARTAMENTO_ORIGEN == 1)//Exaneb toxicologico
{
	$DEPARTAMENTO_ORIGEN = 'VINCULACIÓN Y PROGRAMACIÓN';
}
else if ($DEPARTAMENTO_ORIGEN == 2)//Examen toxicologico.  !QUE MI MARIOOO!!
{
	$DEPARTAMENTO_ORIGEN = 'ISE DOCUMENTOS';
}
else if ($DEPARTAMENTO_ORIGEN == 3)//Exaneb toxicologico
{
	$DEPARTAMENTO_ORIGEN = 'ISE ENTREVISTA';
}
else if ($DEPARTAMENTO_ORIGEN == 4)//Exaneb toxicologico
{
	$DEPARTAMENTO_ORIGEN = 'POLIGRAFÍA';
}
else if ($DEPARTAMENTO_ORIGEN == 5)//Exaneb toxicologico
{
	$DEPARTAMENTO_ORIGEN = 'MÉDICO';
}
else if ($DEPARTAMENTO_ORIGEN == 6)//Exaneb toxicologico
{
	$DEPARTAMENTO_ORIGEN = 'TOXICOLÓGICO';
}


$sql = ("SELECT * FROM `observaciones` WHERE ID_EVALUACION = '$ID_EVALUACION' AND DEPARTAMENTO = '$PRUEBA'");

	$conexion->set_charset("utf8");

	if ($conexion->query($sql) === TRUE) {
   	 	echo "true";
	} else {
    	echo "false";
}
$conexion->close();



?>