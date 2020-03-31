<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 

$FECHA = $_POST['FECHA'];
$PRUEBA = $_POST['PRUEBA'];
$ID_EVALUADOR = $_POST['ID_EVALUADOR'];
if ($PRUEBA == 1)//Exaneb toxicologico
{
	$PRUEBA = 'FECHA_EXAMEN_TOXICOLOGICO';
	$DEPARTAMENTO = 'TOXICOLÓGICO';
}
else if ($PRUEBA == 2)//Examen toxicologico.  !QUE MI MARIOOO!!
{
	$PRUEBA = 'FECHA_ISE_DOCUMENTOS';
	$DEPARTAMENTO = 'ISE DOCUMENTOS';
}
else if ($PRUEBA == 3)//Exaneb toxicologico
{
	$PRUEBA = 'FECHA_ISE_ENTREVISTA';
	$DEPARTAMENTO = 'ISE ENTREVISTA';
}
else if ($PRUEBA == 4)//Exaneb toxicologico
{
	$PRUEBA = 'FECHA_EXAMEN_PSICOLOGICO';
	$DEPARTAMENTO = 'PSICOLOGÍA';
}
else if ($PRUEBA == 5)//Exaneb toxicologico
{
	$PRUEBA = 'FECHA_EXAMEN_MEDICO';
	$DEPARTAMENTO = 'MÉDICO';
}
else if ($PRUEBA == 6)//Exaneb toxicologico
{
	$PRUEBA = 'FECHA_EXAMEN_POLIGRAFICO';
	$DEPARTAMENTO = 'POLIGRAFÍA';
}

$conexion->set_charset("utf8");

/* "SELECT CANDIDATOS.ID_CANDIDATO, ID_EVALUACION, CONCAT(PRIMER_NOMBRE, \" \", SEGUNDO_NOMBRE, \" \", PRIMER_APELLIDO, \" \", SEGUNDO_APELLIDO) AS NOMBRE, FROM CANDIDATOS JOIN EVALUACION ON(CANDIDATOS.ID_CANDIDATO = EVALUACION.ID_CANDIDATO) WHERE $PRUEBA = '$FECHA'"
*/
		//consulta final
	// if ($result = $conexion->query( "SELECT  candidatos.ID_CANDIDATO,  CONCAT(PRIMER_NOMBRE, \" \", SEGUNDO_NOMBRE, \" \", PRIMER_APELLIDO, \" \", SEGUNDO_APELLIDO) AS NOMBRE, evaluacion.ID_EVALUACION, IF(asistencia.ASISTENCIAS IS NULL OR asistencia.PRUEBA != '$PRUEBA',\"No asistió\", \"Asistió\") AS ASISTENCIAS FROM candidatos INNER JOIN evaluacion ON(candidatos.ID_CANDIDATO = evaluacion.ID_CANDIDATO) LEFT JOIN asistencia ON (candidatos.ID_CANDIDATO = asistencia.ID_CANDIDATO) WHERE EVALUACION.$PRUEBA = '$FECHA'")) {



		if ($result = $conexion->query( "SELECT IF (A.PRUEBA IS NULL, \"_-_-_\", A.PRUEBA) AS PRUEBA, 
							IF (A.ASISTENCIAS IS NULL OR A.ASISTENCIAS LIKE 0, \"No asistió\", \"Asistió\") AS ASISTENCIAS, T.NOMBRE, T.ID_CANDIDATO, T.ID_EVALUACION FROM 
							(SELECT candidatos.ID_CANDIDATO, evaluacion.ID_EVALUACION, CONCAT(PRIMER_NOMBRE, \" \", SEGUNDO_NOMBRE, \" \", PRIMER_APELLIDO, \" \", SEGUNDO_APELLIDO) AS NOMBRE
							FROM candidatos INNER JOIN evaluacion ON (candidatos.ID_CANDIDATO = evaluacion.ID_CANDIDATO) LEFT JOIN evaluador_evaluacion ON(evaluacion.ID_EVALUACION = evaluador_evaluacion.ID_EVALUACION)
							WHERE EVALUACION.$PRUEBA = '$FECHA' AND DEPARTAMENTO = '$DEPARTAMENTO' AND ID_EVALUADOR = '$ID_EVALUADOR' ) AS T LEFT JOIN 
							(SELECT * FROM asistencia WHERE asistencia.PRUEBA = '$PRUEBA') AS A ON (T.ID_EVALUACION = A.ID_EVALUACION)  
							ORDER BY T.NOMBRE ASC"
		)) {


		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	//echo print_r($myArray);
    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    	$result -> close();
    }

$conexion -> close();
?>