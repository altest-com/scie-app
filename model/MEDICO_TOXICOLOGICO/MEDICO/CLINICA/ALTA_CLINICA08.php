<?php
header("Content-type: text/html; charset=utf8");
require("../../../conexion.php");
include_once "../ConexionBD.php"; 

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$PADECIMIENTO = $_POST['PADECIMIENTO'];
$PESO = $_POST['PESO'];
$TALLA = $_POST['TALLA'];
$IMC = $_POST['IMC'];
$TA = $_POST['TA'];
$TEMPERATURA = $_POST['TEMPERATURA'];
$F_CARDIACA = $_POST['F_CARDIACA'];
$F_RESPIRATORIA = $_POST['F_RESPIRATORIA'];
$C_ABDOMINAL = $_POST['C_ABDOMINAL'];
$SINTOMAS = $_POST['SINTOMAS'];
$FACIES = $_POST['FACIES'];
$SEXO = $_POST['SEXO'];
$SOMATOTIPO = $_POST['SOMATOTIPO'];
$EDAD_APARENTE = $_POST['EDAD_APARENTE'];
$OBSERVACIONES_HAB = $_POST['OBSERVACIONES_HAB'];
$ACTITUD = $_POST['ACTITUD'];


/*"INSERT INTO ASISTENCIA VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$PRUEBA' ,'$FECHA', '$ASISTENCIA')"*/
		$cone = conectarBD();
		$lol = Verificar_clinica08($cone,$ID_CANDIDATO, $ID_EVALUACION);
		echo $lol;
		$conexion->set_charset("utf8");

		if($lol=="correcto"){
			$sqlUpdate = "UPDATE medico_clinica08 SET PADECIMIENTO = '$PADECIMIENTO', PESO = '$PESO', TALLA = '$TALLA', IMC = '$IMC', TA = '$TA', TEMPERATURA = '$TEMPERATURA',F_CARDIACA='$F_CARDIACA',F_RESPIRATORIA='$F_RESPIRATORIA',C_ABDOMINAL='$C_ABDOMINAL',SINTOMAS='$SINTOMAS',FACIES='$FACIES',SEXO='$SEXO',SOMATOTIPO='$SOMATOTIPO',ACTITUD='$ACTITUD',EDAD_APARENTE='$EDAD_APARENTE',OBSERVACIONES_HAB='$OBSERVACIONES_HAB' WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION ='$ID_EVALUACION'";
			if ($conexion->query($sqlUpdate) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
			
		}

		else{
			$sqlInsert = "INSERT INTO medico_clinica08 VALUES ('$ID_CANDIDATO','$ID_EVALUACION','$PADECIMIENTO','$PESO','$TALLA', '$IMC', '$TA','$TEMPERATURA' ,'$F_CARDIACA', '$F_RESPIRATORIA', '$C_ABDOMINAL', '$SINTOMAS', '$FACIES', '$SEXO', '$SOMATOTIPO', '$ACTITUD', '$EDAD_APARENTE', '$OBSERVACIONES_HAB')";

			if ($conexion->query($sqlInsert) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
		}
		

$conexion->close();

?>