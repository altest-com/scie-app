<?php
header("Content-Type: text/html;charset=utf-8");
include ("../../MySqlConnect.php");
include("../../conection.php");
$conexion = new MySqlConnect($db, $user, $pswd);
//Datos de la evaluación
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$FECHA_EVALUACION = $_POST['FECHA_EVALUACION'];
$TIPO_EVALUACION = $_POST['TIPO_EVALUACION'];
$MOTIVO_EVALUACION = $_POST['MOTIVO_EVALUACION'];
$MODO_EVALUACION = $_POST['MODO_EVALUACION'];
$SOLICITANTE_DE_EVALUACION  = $_POST['SOLICITANTE_DE_EVALUACION'];
$ORIGEN_DE_RECURSOS  = $_POST['ORIGEN_DE_RECURSOS'];
$FECHA_EXAMEN_TOXICOLOGICO  = $_POST['FECHA_EXAMEN_TOXICOLOGICO'];
$FECHA_ISE_DOCUMENTOS  = $_POST['FECHA_ISE_DOCUMENTOS'];
$FECHA_ISE_ENTREVISTA = $_POST['FECHA_ISE_ENTREVISTA'];
$FECHA_EXAMEN_PSICOLOGICO = $_POST['FECHA_EXAMEN_PSICOLOGICO'];
$FECHA_EXAMEN_MEDICO = $_POST['FECHA_EXAMEN_MEDICO'];
$FECHA_EXAMEN_POLIGRAFICO = $_POST['FECHA_EXAMEN_POLIGRAFICO'];
$ESTATUS = $_POST['ESTATUS'];
$EVALUACION_DERIVADA_DE = $_POST['EVALUACION_DERIVADA_DE'];
$AUTORIZACION = "000";
$AUTORIZACION_DOS = "100";

if($EVALUACION_DERIVADA_DE === NULL)
	$EVALUACION_DERIVADA_DE = "---";


$sqlCon = sprintf("SELECT CONCAT(candidatos.PRIMER_NOMBRE, \" \", candidatos.SEGUNDO_NOMBRE, \" \", candidatos.PRIMER_APELLIDO, \" \", candidatos.SEGUNDO_APELLIDO) AS NOMBRE FROM candidatos WHERE ID_CANDIDATO = \"%s\"", $ID_CANDIDATO);


//Verificar si un candidato es nuevo

  $check = mysqli_query($conexion,"SELECT ID_CANDIDATO FROM evaluacion WHERE ID_CANDIDATO = '$ID_CANDIDATO'");
   $exist=mysqli_fetch_array($check); 
 	echo $exist[0];

 	if($exist[0] === NULL ){

$sql = ("INSERT INTO evaluacion (ID_EVALUACION,ID_CANDIDATO,FECHA_EVALUACION,TIPO_EVALUACION,MOTIVO_EVALUACION,MODO_EVALUACION,SOLICITANTE_DE_EVALUACION,ORIGEN_DE_RECURSOS,FECHA_EXAMEN_TOXICOLOGICO, FECHA_ISE_DOCUMENTOS,FECHA_ISE_ENTREVISTA,FECHA_EXAMEN_PSICOLOGICO,FECHA_EXAMEN_MEDICO,FECHA_EXAMEN_POLIGRAFICO,ESTATUS,EVALUACION_DERIVADA_DE,AUTORIZACION) VALUES('$ID_EVALUACION','$ID_CANDIDATO', '$FECHA_EVALUACION', '$TIPO_EVALUACION', '$MOTIVO_EVALUACION', '$MODO_EVALUACION', '$SOLICITANTE_DE_EVALUACION', '$ORIGEN_DE_RECURSOS','$FECHA_EXAMEN_TOXICOLOGICO', '$FECHA_ISE_DOCUMENTOS', '$FECHA_ISE_ENTREVISTA', '$FECHA_EXAMEN_PSICOLOGICO','$FECHA_EXAMEN_MEDICO','$FECHA_EXAMEN_POLIGRAFICO','$ESTATUS','$EVALUACION_DERIVADA_DE','$AUTORIZACION')");

	$conexion->set_charset("utf8");

	if ($conexion->query($sql) === TRUE) {
   	 	echo "true";
	} else {
    	echo "false";
}

}

else{ 

	$sql2 = ("INSERT INTO evaluacion (ID_EVALUACION,ID_CANDIDATO,FECHA_EVALUACION,TIPO_EVALUACION,MOTIVO_EVALUACION,MODO_EVALUACION,SOLICITANTE_DE_EVALUACION,ORIGEN_DE_RECURSOS,FECHA_EXAMEN_TOXICOLOGICO, FECHA_ISE_DOCUMENTOS,FECHA_ISE_ENTREVISTA,FECHA_EXAMEN_PSICOLOGICO,FECHA_EXAMEN_MEDICO,FECHA_EXAMEN_POLIGRAFICO,ESTATUS,EVALUACION_DERIVADA_DE,AUTORIZACION) VALUES('$ID_EVALUACION','$ID_CANDIDATO', '$FECHA_EVALUACION', '$TIPO_EVALUACION', '$MOTIVO_EVALUACION', '$MODO_EVALUACION', '$SOLICITANTE_DE_EVALUACION', '$ORIGEN_DE_RECURSOS','$FECHA_EXAMEN_TOXICOLOGICO', '$FECHA_ISE_DOCUMENTOS', '$FECHA_ISE_ENTREVISTA', '$FECHA_EXAMEN_PSICOLOGICO','$FECHA_EXAMEN_MEDICO','$FECHA_EXAMEN_POLIGRAFICO','$ESTATUS','$EVALUACION_DERIVADA_DE','$AUTORIZACION_DOS')");

	$conexion->set_charset("utf8");

	if ($conexion->query($sql2) === TRUE) {
   	 	echo "true";
	} else {
    	echo "false";
}

}




if ($MODO_EVALUACION == ""){ 

}
 else{ 
$sqlInsert = sprintf("INSERT INTO integracion (ID_CANDIDATO, ID_EVALUACION, FECHA, NOMBRE, VYP, ISE, MEDICO, TOX, PSICO, POLI) VALUES (\"%s\", \"%s\", \"%s\", ( %s ), 0, 0, 0, 0, 0, 0)", 
	$ID_CANDIDATO, $ID_EVALUACION, $FECHA_EVALUACION, $sqlCon);
	//echo $sqlInsert;

	$conexion->set_charset("utf8");

	if ($conexion->query($sqlInsert) === TRUE) {
   	 	echo "true";
	} else {
    	echo "false";
    }
 }
$conexion->close();

?>