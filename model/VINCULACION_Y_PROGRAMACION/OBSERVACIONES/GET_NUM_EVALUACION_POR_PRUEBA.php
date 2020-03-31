<?php
//NUMERO DE OBSERVACIONES DE UNA EVALUACION POR PRUEBA
header("Content-type: text/html; charset=utf8");
require("../../conexion.php"); 
 
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$PRUEBA = $_POST['PRUEBA'];

$conexion->set_charset("utf8");


if ($PRUEBA == 1)//Exaneb toxicologico
{
	$PRUEBA = 'VINCULACIÓN Y PROGRAMACIÓN';
}
else if ($PRUEBA == 2)//Examen toxicologico.  !QUE MI MARIOOO!!
{
	$PRUEBA = 'ISE DOCUMENTOS';
}
else if ($PRUEBA == 3)//Exaneb toxicologico
{
	$PRUEBA = 'ISE ENTREVISTA';
}
else if ($PRUEBA == 4)//Exaneb toxicologico
{
	$PRUEBA = 'POLIGRAFÍA';
}
else if ($PRUEBA == 5)//Exaneb toxicologico
{
	$PRUEBA = 'MÉDICO';
}
else if ($PRUEBA == 6)//Exaneb toxicologico
{
	$PRUEBA = 'TOXICOLÓGICO';
}


	if ($result = $conexion->query("SELECT COUNT(*) FROM OBSERVACIONES WHERE ID_EVALUACION = 'ID_EVALUACION' AND DEPARTAMENTO = '$PRUEBA'")) {
		$row = mysqli_fetch_array($result);
		if($row[0] !== NULL){
			echo sprintf("%d",$row[0]);
		
		}

}