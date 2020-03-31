<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");

error_reporting(0);

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$PRIMER_NOMBRE = $_POST['PRIMER_NOMBRE'];
$SEGUNDO_NOMBRE = $_POST['SEGUNDO_NOMBRE'];
$PRIMER_APELLIDO = $_POST['PRIMER_APELLIDO'];
$SEGUNDO_APELLIDO = $_POST['SEGUNDO_APELLIDO'];
$CURP = $_POST['CURP'];
$DEPENDENCIA = $_POST['DEPENDENCIA'];
$CORPORACION = $_POST['CORPORACION'];
$ADSCRIPCION = $_POST['ADSCRIPCION'];
$PUESTO = $_POST['PUESTO'];
$DOCUMENTO_ORIGEN = $_POST['DOCUMENTO_ORIGEN'];
$HUELLA_DIGITAL = $_POST['HUELLA_DIGITAL'];
$FOTOGRAFIA = $_POST['FOTOGRAFIA'];


$resultado = mysqli_query($conexion,"SELECT ID_CANDIDATO FROM CANDIDATOS WHERE ID_CANDIDATO = '$ID_CANDIDATO'");
$exist=mysqli_fetch_array($resultado);


$resultado = mysqli_query($conexion,"SELECT CURP FROM CANDIDATOS WHERE CURP = '$CURP'");
$exist_curp =mysqli_fetch_array($resultado);

 if($exist[0] === NULL AND $exist_curp[0] === NULL) {

   
   	// $sqlQuery = sprintf("BEGIN; INSERT INTO CANDIDATOS (ID_CANDIDATO,PRIMER_NOMBRE,SEGUNDO_NOMBRE,PRIMER_APELLIDO,SEGUNDO_APELLIDO,CURP,DEPENDENCIA,CORPORACION,ADSCRIPCION,PUESTO,HUELLA_DIGITAL,FOTOGRAFIA) VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s'); INSERT INTO OFICIOS VALUES ('ADAS', 'SDFSDV'); COMMIT;", " ", " "," "," "," SDV"," SFV"," DSVS"," "," "," "," "," ");


	$sql = ("INSERT INTO candidatos (ID_CANDIDATO,PRIMER_NOMBRE,SEGUNDO_NOMBRE,PRIMER_APELLIDO,SEGUNDO_APELLIDO,CURP,DEPENDENCIA,CORPORACION,ADSCRIPCION,PUESTO,HUELLA_DIGITAL,FOTOGRAFIA) 
		VALUES('$ID_CANDIDATO','$PRIMER_NOMBRE', '$SEGUNDO_NOMBRE', '$PRIMER_APELLIDO', '$SEGUNDO_APELLIDO', '$CURP', '$DEPENDENCIA', '$CORPORACION', '$ADSCRIPCION', '$PUESTO', '$HUELLA_DIGITAL', '$FOTOGRAFIA')");
		$conexion->set_charset("utf8");
		if ($conexion->query($sql) === TRUE ) 
		{
	   	 	echo "true"; 
	   	 	include("../BUSCAR_ELEMENTO/BUSQUEDA_CURP.php");
		} 
		else 
		{
	    	echo "false";
	  	}

}
else
{  
	echo "Registro existe";
}



$conexion->close();

?>