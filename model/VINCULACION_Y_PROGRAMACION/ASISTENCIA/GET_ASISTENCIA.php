<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 
include_once "ConexionBD.php";

error_reporting(0);
$FECHA = $_POST['FECHA'];
$PRUEBA = (int)$_POST['PRUEBA'];
$ID_EVALUADOR = "";
$DepartamentoEvaluador = "";

if (isset($_POST['ID_EVALUADOR']))
{
	$ID_EVALUADOR = $_POST['ID_EVALUADOR'];
}
else
{
	$esDigiscan = TRUE;
}
$esVinculacion = ($PRUEBA == 0 ? TRUE : FALSE);

if ($PRUEBA == 1)//Exaneb toxicologico
{
	$PRUEBA = 'FECHA_EXAMEN_TOXICOLOGICO';
	$DEPARTAMENTO = 'TOXICOLÓGICO';
	$DepartamentoEvaluador = 'TOXICOLÓGICO';

}
else if ($PRUEBA == 2)//Examen toxicologico.  !QUE MI MARIOOO!!
{
	$PRUEBA = 'FECHA_ISE_DOCUMENTOS';
	$DEPARTAMENTO = 'ISE DOCUMENTOS';
	$DepartamentoEvaluador = 'ISE';
}
else if ($PRUEBA == 3)//Exaneb toxicologico
{
	$PRUEBA = 'FECHA_ISE_ENTREVISTA';
	$DEPARTAMENTO = 'ISE ENTREVISTA';
	$DepartamentoEvaluador = 'ISE';
}
else if ($PRUEBA == 4)//Exaneb toxicologico
{
	$PRUEBA = 'FECHA_EXAMEN_PSICOLOGICO';
	$DEPARTAMENTO = 'PSICOLOGÍA';
	$DepartamentoEvaluador = 'PSICOLOGÍA';
}
else if ($PRUEBA == 5)//Exaneb toxicologico
{
	$PRUEBA = 'FECHA_EXAMEN_MEDICO';
	$DEPARTAMENTO = 'MÉDICO';
	$DepartamentoEvaluador = 'MÉDICO';
}
else if ($PRUEBA == 6)//Exaneb toxicologico
{
	$PRUEBA = 'FECHA_EXAMEN_POLIGRAFICO';
	$DEPARTAMENTO = 'POLIGRAFÍA';
	$DepartamentoEvaluador = 'POLIGRAFÍA';
}

$conexion->set_charset("utf8");
$myArray = array();
if ($esVinculacion)
{
	//SI PRUEBA = 0 SE EJECUTA LA CONSULTA CORRESPONDIENTE PARA VINCULACIÓN Y PROGRAMACIÓN
	$MyQuery = sprintf("SELECT C.ID_CANDIDATO AS ID, C.ID_CANDIDATO,
	CONCAT(C.PRIMER_NOMBRE, \" \", C.SEGUNDO_NOMBRE, \" \", C.PRIMER_APELLIDO, \" \", C.SEGUNDO_APELLIDO) AS NOMBRE, C.CURP, C.HUELLA_DIGITAL AS HUELLA, E.ID_EVALUACION, E.FOLIO, E.EVALUACION_DERIVADA_DE FROM CANDIDATOS AS C 
	INNER JOIN EVALUACION AS E ON (C.ID_CANDIDATO = E.ID_CANDIDATO)
    WHERE '%s' IN (
    IF(E.EVALUACION_DERIVADA_DE !='',(DATE(E.FECHA_EXAMEN_POLIGRAFICO)),
    DATE(E.FECHA_EXAMEN_TOXICOLOGICO)),
    DATE(E.FECHA_EXAMEN_TOXICOLOGICO)
        ) 
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
	//ECHO "NUMERO 1";
	$cone = conectarBD();
	if ($esDigiscan)
	{
		$lol = "ADMINISTRADOR";
	}
	else
	{
		$lol = Obtener_Permisos($cone,$ID_EVALUADOR);
	}
	
	//echo $lol;
	if($lol=="ADMINISTRADOR" || $lol=="JEFE DE AREA" || $lol=="SUPERVISOR" || $lol == "PSICOMETRISTA" || $DEPARTAMENTO == "ISE DOCUMENTOS"){
		$query = "
		SELECT CE.ID_EVALUACION, CE.ID_CANDIDATO,
		CONCAT (CE.PRIMER_APELLIDO, ' ', 
				IF (CE.SEGUNDO_APELLIDO LIKE '', ' ', CE.SEGUNDO_APELLIDO), ' ', CE.PRIMER_NOMBRE, ' ',
				IF (CE.SEGUNDO_NOMBRE LIKE '', ' ', CE.SEGUNDO_NOMBRE)) AS NOMBRE,
		IF (A.PRUEBA IS NULL, \"_-_-_\", A.PRUEBA) AS PRUEBA, 
		IF (A.ASISTENCIAS IS NULL OR A.ASISTENCIAS LIKE 0, \"No asistió\", \"Asistió\") AS ASISTENCIAS,  
		EE.ID_EVALUADOR AS EVALUADOR
				
		FROM (SELECT EVALUACION.ID_EVALUACION, CANDIDATOS.ID_CANDIDATO, CANDIDATOS.PRIMER_NOMBRE, CANDIDATOS.SEGUNDO_NOMBRE, CANDIDATOS.PRIMER_APELLIDO, CANDIDATOS.SEGUNDO_APELLIDO
			FROM CANDIDATOS 
			INNER JOIN EVALUACION ON (CANDIDATOS.ID_CANDIDATO = EVALUACION.ID_CANDIDATO) 
			WHERE EVALUACION.MODO_EVALUACION !='FILTRO' AND DATE(EVALUACION.$PRUEBA) LIKE DATE('$FECHA') ) AS CE
		LEFT JOIN (SELECT * FROM ASISTENCIA WHERE PRUEBA LIKE '$PRUEBA') AS A ON (CE.ID_EVALUACION = A.ID_EVALUACION)
		LEFT JOIN (SELECT ID_EVALUADOR, ID_EVALUACION FROM EVALUADOR_EVALUACION WHERE DEPARTAMENTO = '$DepartamentoEvaluador') AS EE ON (CE.ID_EVALUACION = EE.ID_EVALUACION)
		 ORDER BY NOMBRE ASC";
		if ($result = $conexion->query($query)) {
			
			
			/*
			"SELECT IF (evaluador_evaluacion.ID_EVALUADOR IS NULL, 'Sin asignar', evaluador_evaluacion.ID_EVALUADOR) AS EVALUADOR, 
							IF (A.PRUEBA IS NULL, \"_-_-_\", A.PRUEBA) AS PRUEBA, 
							IF (A.ASISTENCIAS IS NULL OR A.ASISTENCIAS LIKE 0, \"No asistió\", \"Asistió\") AS ASISTENCIAS, T.NOMBRE, T.ID_CANDIDATO, T.ID_EVALUACION FROM 
							(SELECT candidatos.ID_CANDIDATO, evaluacion.ID_EVALUACION, CONCAT(PRIMER_APELLIDO, \" \", SEGUNDO_APELLIDO, \" \", PRIMER_NOMBRE, \" \", SEGUNDO_NOMBRE) AS NOMBRE
							FROM candidatos INNER JOIN evaluacion ON (candidatos.ID_CANDIDATO = evaluacion.ID_CANDIDATO)
							WHERE DATE(EVALUACION.$PRUEBA) = DATE('$FECHA')) AS T LEFT JOIN 
							(SELECT * FROM asistencia WHERE asistencia.PRUEBA = '$PRUEBA') AS A ON (T.ID_EVALUACION = A.ID_EVALUACION)
							LEFT JOIN evaluador_evaluacion ON (A.ID_EVALUACION = evaluador_evaluacion.ID_EVALUACION)
							ORDER BY T.NOMBRE ASC"
			
			*/
							
				
			while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            	$myArray[] = $row;
    		}
    		//echo print_r($myArray);
    		echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    		$result -> close();
    	}
	}
	else{
		//ECHO "NUMERO 2";
		$query = "SELECT CE.ID_EVALUACION, CE.ID_CANDIDATO,
		CONCAT (CE.PRIMER_APELLIDO, ' ', 
				IF (CE.SEGUNDO_APELLIDO LIKE '', ' ', CE.SEGUNDO_APELLIDO), ' ', CE.PRIMER_NOMBRE, 
				IF (CE.SEGUNDO_NOMBRE LIKE '', ' ', CE.SEGUNDO_NOMBRE)) AS NOMBRE,
		IF (A.PRUEBA IS NULL, \"_-_-_\", A.PRUEBA) AS PRUEBA, 
		IF (A.ASISTENCIAS IS NULL OR A.ASISTENCIAS LIKE 0, \"No asistió\", \"Asistió\") AS ASISTENCIAS,  
		EE.ID_EVALUADOR AS EVALUADOR
				
		FROM (SELECT EVALUACION.ID_EVALUACION, CANDIDATOS.ID_CANDIDATO, CANDIDATOS.PRIMER_NOMBRE, CANDIDATOS.SEGUNDO_NOMBRE, CANDIDATOS.PRIMER_APELLIDO, CANDIDATOS.SEGUNDO_APELLIDO
			FROM CANDIDATOS INNER JOIN EVALUACION ON (CANDIDATOS.ID_CANDIDATO = EVALUACION.ID_CANDIDATO) 
			WHERE EVALUACION.MODO_EVALUACION !='FILTRO' AND DATE(EVALUACION.$PRUEBA) LIKE DATE('$FECHA') ) AS CE
		LEFT JOIN (SELECT * FROM ASISTENCIA WHERE PRUEBA LIKE '$PRUEBA') AS A ON (CE.ID_EVALUACION = A.ID_EVALUACION)
		LEFT JOIN (SELECT ID_EVALUADOR, ID_EVALUACION FROM EVALUADOR_EVALUACION WHERE DEPARTAMENTO = '$DepartamentoEvaluador') AS EE ON (CE.ID_EVALUACION = EE.ID_EVALUACION) WHERE EE.ID_EVALUADOR = '$ID_EVALUADOR'
		ORDER BY NOMBRE ASC";
		if ($result = $conexion->query($query)) {


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