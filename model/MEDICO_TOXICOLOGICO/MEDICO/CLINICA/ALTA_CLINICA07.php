<?php
header("Content-type: text/html; charset=utf8");
require("../../../conexion.php");
include_once "../ConexionBD.php"; 

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$ENFERMEDADES = $_POST['ENFERMEDADES'];
$OTRAS1 = $_POST['OTRAS1'];
$OTRAS2 = $_POST['OTRAS2'];
$OTRAS3 = $_POST['OTRAS3'];
$OTRAS4 = $_POST['OTRAS4'];
$OTRAS5 = $_POST['OTRAS5'];
$MENARCA = $_POST['MENARCA'];
$ESTATUS = $_POST['ESTATUS'];
$CUANDO = $_POST['CUANDO'];
$DIAS = $_POST['DIAS'];
$DISMENORREA = $_POST['DISMENORREA'];
$EUMENORREA = $_POST['EUMENORREA'];
$FUM = $_POST['FUM'];
$GESTAS = $_POST['GESTAS'];
$PARTOS = $_POST['PARTOS'];
$CESAREAS = $_POST['CESAREAS'];
$ABORTOS = $_POST['ABORTOS'];
$FUP = $_POST['FUP'];
$IVSA = $_POST['IVSA'];
$PS = $_POST['PS'];
$MPF = $_POST['MPF'];
$PAPANICOLAU = $_POST['PAPANICOLAU'];
$ANTIGENO = $_POST['ANTIGENO'];


/*"INSERT INTO ASISTENCIA VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$PRUEBA' ,'$FECHA', '$ASISTENCIA')"*/
		$cone = conectarBD();
		$lol = Verificar_clinica07($cone,$ID_CANDIDATO, $ID_EVALUACION);
		echo $lol;
		$conexion->set_charset("utf8");

		if($lol=="correcto"){
			$sqlUpdate = "UPDATE medico_clinica07 SET ENFERMEDADES = '$ENFERMEDADES', OTRAS1 = '$OTRAS1', OTRAS2 = '$OTRAS2', OTRAS3 = '$OTRAS3', OTRAS4 = '$OTRAS4', OTRAS5 = '$OTRAS5',MENARCA='$MENARCA',ESTATUS='$ESTATUS',CUANDO='$CUANDO',DIAS='$DIAS',DISMENORREA='$DISMENORREA',EUMENORREA='$EUMENORREA',FUM='$FUM',GESTAS='$GESTAS',PARTOS='$PARTOS',CESAREAS='$CESAREAS',ABORTOS='$ABORTOS',FUP='$FUP',IVSA='$IVSA',PS='$PS',MPF='$MPF',PAPANICOLAU='$PAPANICOLAU',ANTIGENO='$ANTIGENO' WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION ='$ID_EVALUACION'";
			if ($conexion->query($sqlUpdate) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
			
		}

		else{
			$sqlInsert = "INSERT INTO medico_clinica07 VALUES ('$ID_CANDIDATO','$ID_EVALUACION','$ENFERMEDADES', '$OTRAS1', '$OTRAS2','$OTRAS3' ,'$OTRAS4', '$OTRAS5', '$MENARCA', '$ESTATUS', '$CUANDO', '$DIAS', '$DISMENORREA', '$EUMENORREA', '$FUM', '$GESTAS', '$PARTOS', '$CESAREAS', '$ABORTOS', '$FUP', '$IVSA', '$PS', '$MPF', '$PAPANICOLAU', '$ANTIGENO')";

			if ($conexion->query($sqlInsert) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
		}
		

$conexion->close();

?>