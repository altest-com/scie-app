<?php
header("Content-type: text/html; charset=utf8");
include ("../../MySqlConnect.php");
include ("../../conection.php"); 
$conexion = new MySqlConnect($db, $user, $pswd);
error_reporting(0);

//Para el candidato, estos datos son los del candidato.
$CURP = $_POST['CURP'];
$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$PRIMER_NOMBRE = $_POST['PRIMER_NOMBRE'];
$SEGUNDO_NOMBRE = $_POST['SEGUNDO_NOMBRE'];
$PRIMER_APELLIDO = $_POST['PRIMER_APELLIDO'];
$SEGUNDO_APELLIDO = $_POST['SEGUNDO_APELLIDO'];

//Verificando si todos los datos del candidato fueron enviados
 if (isset($CURP) && isset($ID_CANDIDATO) && isset($PRIMER_NOMBRE) && isset($SEGUNDO_NOMBRE)	&& isset($PRIMER_APELLIDO) && isset($SEGUNDO_APELLIDO))
 {
 	//Todo correcto hasta este punto
	//Insertar candidato y oficio usando el método executeInsertQuery
	$sqlVerificarExistencia = sprintf("SELECT ID_CANDIDATO AS ROW FROM CANDIDATOS WHERE CURP = '%s'", $CURP);
	$IdCdto = $conexion->getSingleValueFromQuery($sqlVerificarExistencia);
	if ($IdCdto == NULL)
	{
		//No existe el candidato en sistema...INSERTAR!!
		$query = sprintf("INSERT INTO CANDIDATOS (ID_CANDIDATO, PRIMER_NOMBRE, SEGUNDO_NOMBRE, PRIMER_APELLIDO, SEGUNDO_APELLIDO, CURP, HUELLA_DIGITAL, FOTOGRAFIA)
 		VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s');", $ID_CANDIDATO, $PRIMER_NOMBRE, $SEGUNDO_NOMBRE, $PRIMER_APELLIDO, $SEGUNDO_APELLIDO, $CURP, NULL, NULL);
 		//echo $query;
 		if ($conexion->executeInsertQuery($query, 1))
 		{
 			echo "true";
 		}
 		else
 		{
 			echo "false";
 		}
	}
}
else
{
	echo "Solicitud no procesada 0x000010 false";
}
?>