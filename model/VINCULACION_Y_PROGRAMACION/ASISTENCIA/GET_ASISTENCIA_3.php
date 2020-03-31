<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 
include_once "ConexionBD.php";

$ID_EVALUACION;
if (isset($_POST['ID_EVALUACION']))
{
	$ID_EVALUACION = $_POST['ID_EVALUACION'];
}
$FECHA = $_REQUEST['FECHA'];
$PRUEBA = (int)$_REQUEST['PRUEBA'];
$ID_EVALUADOR = $_REQUEST['ID_EVALUADOR'];

$esVinculacion = ($PRUEBA == 0 ? TRUE:FALSE);

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
$myArray = array();
if ($esVinculacion)
{
	//SI PRUEBA = 0 SE EJECUTA LA CONSULTA CORRESPONDIENTE PARA VINCULACIÓN Y PROGRAMACIÓN
	$MyQuery = sprintf("SELECT C.ID_CANDIDATO AS ID, E.ID_EVALUACION AS ID_E, CONCAT(C.PRIMER_NOMBRE, \" \", C.SEGUNDO_NOMBRE, \" \", C.PRIMER_APELLIDO, \" \", C.SEGUNDO_APELLIDO) AS NOMBRE, C.CURP, C.HUELLA_DIGITAL AS HUELLA FROM CANDIDATOS AS C 
	INNER JOIN EVALUACION AS E ON (C.ID_CANDIDATO = E.ID_CANDIDATO)
    WHERE '%s' IN (DATE(E.FECHA_EXAMEN_TOXICOLOGICO), DATE(E.FECHA_ISE_DOCUMENTOS), DATE(E.FECHA_ISE_ENTREVISTA), DATE(E.FECHA_EXAMEN_PSICOLOGICO), DATE(E.FECHA_EXAMEN_MEDICO), DATE(E.FECHA_EXAMEN_POLIGRAFICO)) 
    ORDER BY NOMBRE ASC", $FECHA);

	if ($result = $conexion->query($MyQuery)) 
	{
		while($row = $result->fetch_array(MYSQLI_ASSOC)) 
		{
            $myArray[] = $row;
    	}
    	//echo print_r($myArray);
    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    	$result -> close();
    }
}
else
{
	$cone = conectarBD();
	$lol = Obtener_Permisos($cone,$ID_EVALUADOR);
	//echo $lol;
	if($lol=="ADMINISTRADOR" || $lol=="JEFE DE AREA" || $lol=="SUPERVISOR" || $lol == "PSICOMETRISTA"){
		if ($result = $conexion->query( "SELECT IF (A.PRUEBA IS NULL, \"_-_-_\", A.PRUEBA) AS PRUEBA, 
							IF (A.ASISTENCIAS IS NULL OR A.ASISTENCIAS LIKE 0, \"No asistió\", \"Asistió\") AS ASISTENCIAS, T.NOMBRE, T.ID_CANDIDATO, T.ID_EVALUACION, 
							(SELECT candidatos.ID_CANDIDATO, evaluacion.ID_EVALUACION, CONCAT(PRIMER_APELLIDO, \" \", SEGUNDO_APELLIDO, \" \", PRIMER_NOMBRE, \" \", SEGUNDO_NOMBRE) AS NOMBRE
							FROM candidatos INNER JOIN evaluacion ON (candidatos.ID_CANDIDATO = evaluacion.ID_CANDIDATO)
							WHERE DATE(EVALUACION.$PRUEBA) = '$FECHA') AS T LEFT JOIN 
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
	}
	else{
		echo "CORRECTO";
		if ($result = $conexion->query( "SELECT IF (A.PRUEBA IS NULL, \"_-_-_\", A.PRUEBA) AS PRUEBA, 
							IF (A.ASISTENCIAS IS NULL OR A.ASISTENCIAS LIKE 0, \"No asistió\", \"Asistió\") AS ASISTENCIAS, T.NOMBRE, T.ID_CANDIDATO, T.ID_EVALUACION,
							(SELECT candidatos.ID_CANDIDATO, evaluacion.ID_EVALUACION, CONCAT(PRIMER_APELLIDO, \" \", SEGUNDO_APELLIDO, \" \", PRIMER_NOMBRE, \" \", SEGUNDO_NOMBRE) AS NOMBRE
							FROM candidatos INNER JOIN evaluacion ON (candidatos.ID_CANDIDATO = evaluacion.ID_CANDIDATO) LEFT JOIN evaluador_evaluacion ON(evaluacion.ID_EVALUACION = evaluador_evaluacion.ID_EVALUACION)
							WHERE DATE(EVALUACION.$PRUEBA) = '$FECHA' AND DEPARTAMENTO = '$DEPARTAMENTO' AND ID_EVALUADOR = '$ID_EVALUADOR' ) AS T LEFT JOIN 
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
	}
	
}

$conexion -> close();
?>