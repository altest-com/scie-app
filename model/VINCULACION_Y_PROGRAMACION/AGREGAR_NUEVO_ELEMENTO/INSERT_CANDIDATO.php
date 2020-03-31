<?php
header("Content-type: text/html; charset=utf8");
include ("../../MySqlConnect.php");
include ("../../conection.php"); 
include_once "ConexionBD.php"; 
$conexion = new MySqlConnect($db, $user, $pswd);
//error_reporting(0);
//Para oficio, los datos de oficio son generales (los mismos) para todos.
$OFICIO = $_POST['OFICIO'];
$DEPENDENCIA = $_POST['DEPENDENCIA'];
$CORPORACION = $_POST['CORPORACION'];
$ADSCRIPCION = $_POST['ADSCRIPCION'];
$PUESTO = $_POST['PUESTO'];
$FECHA = $_POST['FECHA'];
//Para el candidato, estos datos son los del candidato.
$CURP = $_POST['CURP'];
$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$PRIMER_NOMBRE = $_POST['PRIMER_NOMBRE'];
$SEGUNDO_NOMBRE = $_POST['SEGUNDO_NOMBRE'];
$PRIMER_APELLIDO = $_POST['PRIMER_APELLIDO'];
$SEGUNDO_APELLIDO = $_POST['SEGUNDO_APELLIDO'];

//Verificando si todos los datos para el oficio fueron enviados
if(isset($OFICIO) && isset($CORPORACION) && isset($DEPENDENCIA) && isset($FECHA) && isset($ADSCRIPCION) && isset($PUESTO))
{
 	//Verificando si todos los datos del candidato fueron enviados
 	if (isset($CURP) && isset($ID_CANDIDATO) && isset($PRIMER_NOMBRE) && isset($SEGUNDO_NOMBRE)	&& isset($PRIMER_APELLIDO) && isset($SEGUNDO_APELLIDO))
 	{
 		//Todo correcto hasta este punto
		//Insertar candidato y oficio usando el método executeInsertQuery
		$sqlVerificarExistencia = sprintf("SELECT ID_CANDIDATO AS ROW FROM CANDIDATOS WHERE CURP = '%s'", $CURP);
		$IdCdto = $conexion->getSingleValueFromQuery($sqlVerificarExistencia);
		if ($IdCdto == NULL)
		{
			//No existe el candidato en sistema...
			$query = sprintf("INSERT INTO CANDIDATOS (ID_CANDIDATO, PRIMER_NOMBRE, SEGUNDO_NOMBRE, PRIMER_APELLIDO, SEGUNDO_APELLIDO, CURP, HUELLA_DIGITAL, FOTOGRAFIA)
 			VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s');", $ID_CANDIDATO, $PRIMER_NOMBRE, $SEGUNDO_NOMBRE, $PRIMER_APELLIDO, $SEGUNDO_APELLIDO, $CURP, NULL, NULL);
 			$query .= sprintf("INSERT INTO OFICIOS
 			VALUES ('%s', '%s', NULL, '%s', '%s', '%s', '%s', '%s');", $OFICIO, $ID_CANDIDATO, $DEPENDENCIA, $ADSCRIPCION, $CORPORACION, $PUESTO, $FECHA);
 			//echo $query;
 			if ($conexion->executeInsertQuery($query, 2))
 			{
 				echo "true";
 			}
 			else
 			{
 				echo "false";
 			}
		}
		else
		{
			$conexion1 = conectarBD();
			$resultado = VERIFICAR_EXISTENCIA($conexion1,$IdCdto,$OFICIO,$FECHA);
			
			$existeConDatosDeOficioIdenticos = sprintf("SELECT COUNT (*) AS ROW FROM OFICIOS WHERE NUM_OFICIO LIKE '%s' AND ID_CANDIDATO LIKE '%s';", $OFICIO, $IdCdto);
			$response = (int)$conexion->getSingleValueFromQuery($existeConDatosDeOficioIdenticos);
			if ($response > 0)
			{
				// ya existe
			}
			else
			{
				echo $resultado;
				if ((int)$resultado == 0)
				{
				
					$query = sprintf("INSERT INTO OFICIOS (NUM_OFICIO, ID_CANDIDATO, ID_EVALUACION, DEPENDENCIA, ADSCRIPCION, CORPORACION, PUESTO, FECHA)
					VALUES ('%s', '%s', NULL, '%s', '%s', '%s', '%s', '%s');", $OFICIO, $IdCdto, $DEPENDENCIA, $ADSCRIPCION, $CORPORACION, $PUESTO, $FECHA);
					//ion->executeSelectQuery("SELECT * FROM OFICIOS LIMIT 2", TRUE);
 					$conexion->executeInsertQuery($query,1);
 					echo $query;

				}
				else
				{
					
					echo "false";
				}
			}
			//echo "false";
			// Si resultado es mayor a 0, ese candidato ya esta registrado en el mismo numero de oficio del mismo año.
		}
  	}
 	else
 	{
 		echo "Solicitud no procesada 0x000010 false";
  	}
}
else
{
	echo "Solicitud no procesada 0x00001 false";
}
$conexion->closeMySqlConnection();
?>