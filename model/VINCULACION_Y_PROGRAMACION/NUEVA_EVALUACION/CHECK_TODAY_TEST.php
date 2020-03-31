<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 

$TIPO_EXAMEN = $_POST['TIPO_EXAMEN'];
$FECHA = $_POST['FECHA'];
$EXAMEN = '';


if ($TIPO_EXAMEN == 1)//Exaneb toxicologico
{
    $EXAMEN = "FECHA_EXAMEN_TOXICOLOGICO";
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

$conexion->set_charset("utf8");
	if ($resultado = $conexion->query("SELECT CONCAT(PRIMER_APELLIDO, \" \", SEGUNDO_APELLIDO, \" \", PRIMER_NOMBRE, \" \", SEGUNDO_NOMBRE) AS NOMBRE, $EXAMEN AS FECHA, ID_EVALUACION, CURP FROM candidatos JOIN evaluacion ON (candidatos.ID_CANDIDATO = evaluacion.ID_CANDIDATO) WHERE evaluacion.$EXAMEN = '$FECHA' ORDER BY NOMBRE DESC")) {
		while($row = $resultado->fetch_array(MYSQLI_ASSOC)) {
           	$myArray[] = $row;
   		}
   		echo json_encode($myArray, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        $resultado -> close();
   	}
    else{
        echo json_encode("Error", JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
$conexion -> close();
?>
