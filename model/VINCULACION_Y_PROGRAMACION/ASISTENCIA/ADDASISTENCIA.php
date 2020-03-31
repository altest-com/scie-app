<?php
header("Content-type: text/html; charset=utf8");
include ("../../conection.php");
include ("../../MySqlConnect.php");
//Datos requeridos para asistencia
$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$FECHA = $_POST['FECHA'];
$PRUEBA = intval($_POST['PRUEBA']);

//Datos requeridos
$CAMPO_PRUEBA = intval($_POST['PRUEBA_SC']);
$FECHA_E = $_POST['FECHA_E'];
//Verificando los datos enviados para asistencia.
if (isset($ID_CANDIDATO) && isset($ID_EVALUACION) && isset($FECHA) && isset($PRUEBA))
{
	//Verificando los datos enviados para seguimiento de candidatos.
	if (isset($CAMPO_PRUEBA) && isset($FECHA_E))
	{
		$EXAMEN = "";
		//Colocando valor a examen
		switch ($PRUEBA) {
			case 1:
				$EXAMEN = 'FECHA_EXAMEN_TOXICOLÓGICO';
				break;
			case 2:
				$EXAMEN = 'FECHA_ISE_DOCUMENTOS';
				break;
			case 3:
				$EXAMEN = 'FECHA_ISE_ENTREVISTA';
				break;
			case 4:
				$EXAMEN = 'FECHA_EXAMEN_PSICOLÓGICO';
				break;
			case 5:
				$EXAMEN = 'FECHA_EXAMEN_MÉDICO';
				break;
			case 6:
				$EXAMEN = 'FECHA_EXAMEN_POLIGRÁFICO';
				break;
			default:
				# code...
				break;
		}
		//Colocando valor a evaluación
		$EVALUACION = "";
		switch ($CAMPO_PRUEBA) {
			case 2:
				$EVALUACION = "ISE_E";
				break;
			case 3:
				$EVALUACION = "MED_E";
				break;
			case 4:
				$EVALUACION = "TOX_E";
				break;
			case 5:
				$EVALUACION = "PSI_E";
				break;
			case 6:
				$EVALUACION = "POL_E";
				break;
			default:
				# code...
				break;
		}
		//Conexión a base de datos establecida
		$conexion = new MySqlConnect($db, $user, $pswd);
		//Obtenemos nombre del candidato
		$sqlGetNombre = sprintf("SELECT CONCAT (PRIMER_NOMBRE, ' ', SEGUNDO_NOMBRE, ' ', PRIMER_APELLIDO, ' ', SEGUNDO_APELLIDO) AS ROW 
			FROM CANDIDATOS WHERE ID_CANDIDATO = '%s'", $ID_CANDIDATO);
		$NOMBRE = $conexion->getSingleValueFromQuery($sqlGetNombre);
		//Preparamos la sentencia de inserción de la asistencia
		$sqlInsertAsistencia = sprintf("INSERT INTO ASISTENCIA (ID_CANDIDATO, ID_EVALUACION, NOMBRE, PRUEBA, FECHA, ASISTENCIAS)
			VALUES ('%s', '%s', '%s', '%s', '%s', %d);", $ID_CANDIDATO, $ID_EVALUACION, $NOMBRE, $EXAMEN, $FECHA, 1);
		//Preparamos la sentencia de actualización de la asistencia
		###$sqlUpdateAsistencia = sprintf("UPDATE ASISTENCIA SET %s = %d WHERE ID_EVALUACION = '%s';", $EXAMEN, 1, $ID_EVALUACION);
		//Obtenemos la CURP del candidato
		$sqlGetCurp = sprintf("SELECT CURP AS ROW FROM CANDIDATOS WHERE ID_CANDIDATO = '%s'", $ID_CANDIDATO);
		$CURP = $conexion->getSingleValueFromQuery($sqlGetCurp);
		//Revisamos cuantos registros hay en la tabla 'seguimiento_candidatos' con los datos especificados
		$sqlExisteRegistroSC = sprintf("SELECT COUNT(*) AS ROW FROM SEGUIMIENTO_CANDIDATOS WHERE ID_EVALUACION = '%s' AND CURP = '%s'", $ID_EVALUACION, $CURP);
		$existeRegistroSC = $conexion->getSingleValueFromQuery($sqlExisteRegistroSC);
		//Preparando la consulta de inserción para la tabla "seguimiento_candidatos"
		$sqlInsertSC = sprintf("INSERT INTO SEGUIMIENTO_CANDIDATOS (ID_EVALUACION, FECHA_EVALUACION, NOMBRE, CURP, ISE_E, ISE_S, MED_E, MED_S, TOX_E, TOX_S, POL_E, POL_S, PSI_E, PSI_S)
			VALUES ('%s', (SELECT FECHA_EVALUACION FROM EVALUACION WHERE ID_EVALUACION = '%s'), '%s', '%s', %d, %d, %d, %d, %d, %d, %d, %d, %d, %d);", 
			$ID_EVALUACION, $ID_EVALUACION, $NOMBRE, $CURP, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
		//Prearando la consulta de actualización del registro en la tabla "seguimiento_candidatos"
		$sqlUpdateSC = sprintf("UPDATE SEGUIMIENTO_CANDIDATOS SET %s = '%s' WHERE ID_EVALUACION = '%s' AND CURP = '%s';", $EVALUACION, $FECHA_E, $ID_EVALUACION, $CURP);
		//Verificamos si ya existe registro en la tabla asistencias con los datos del candidato y la evaluación especificados.
		$sql = "";
		$sqlCount = 0;
		if ($existeRegistroSC > 0)
		{
			/*
			Exista o no un registro en la tabla de asistencia y si existe un registro en la tabla seguimiento_Candidatos, 
			hacer las siguientes operaciones:
			De tal forma que aquí se harían las siguientes operaciones sobre la base de datos:
			1. Insert registro en la tabla Asistencia
			2. Update al registro en la tabla Seguimiento_Candidatos
			*/
			$sql .= $sqlInsertAsistencia.$sqlUpdateSC;
			$sqlCount = 2;
		}
		else
		{
			/*
			Exista o no un registro en la tabla de asistencia pero NO un registro en la tabla seguimiento_Candidatos, 
			hacer las siguientes operaciones:
			De tal forma que aquí se harían las siguientes operaciones sobre la base de datos:
			1. Insert registro en la tabla Asistencia
			2. Insertar el registro en la tabla Seguimiento_Candidatos
			3. Update al registro en la tabla Seguimiento_Candidatos
			*/
			$sql .= $sqlInsertAsistencia.$sqlInsertSC.$sqlUpdateSC;
			$sqlCount = 3;
		}
		if ($sqlCount > 0)
		{
			$conexion->executeInsertQuery($sql, $sqlCount);
		}
		else
		{
			echo "Solicitud no procesada 0x000011-false";
		}
	}
}
$conexion->closeMySqlConnection();
?>