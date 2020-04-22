<?php
header("Content-type: text/html; charset=utf8");
require("../../../conexion.php");
include_once "../ConexionBD.php"; 

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$COLOR_ASPECTO = $_POST['COLOR_ASPECTO'];
$GLUCOSA = $_POST['GLUCOSA'];
$BILIRRUBINA = $_POST['BILIRRUBINA'];
$CETONAS = $_POST['CETONAS'];
$DENSIDAD = $_POST['DENSIDAD'];
$SANGRE = $_POST['SANGRE'];
$PH = $_POST['PH'];
$PROTONES = $_POST['PROTONES'];
$UROBILINOGENO = $_POST['UROBILINOGENO'];
$NITRITOS = $_POST['NITRITOS'];
$LEUCOCITOS = $_POST['LEUCOCITOS'];


/*"INSERT INTO ASISTENCIA VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$PRUEBA' ,'$FECHA', '$ASISTENCIA')"*/
		$cone = conectarBD();
		$lol = Verificar_bitacora3($cone,$ID_CANDIDATO, $ID_EVALUACION);
		echo $lol;
		$conexion->set_charset("utf8");

		if($lol=="correcto"){
			$sqlUpdate = "UPDATE medico_bitacora3 SET COLOR_ASPECTO = '$COLOR_ASPECTO', GLUCOSA = '$GLUCOSA', BILIRRUBINA = '$BILIRRUBINA', CETONAS = '$CETONAS', DENSIDAD = '$DENSIDAD', SANGRE = '$SANGRE', PH = '$PH', PROTONES = '$PROTONES', UROBILINOGENO = '$UROBILINOGENO', NITRITOS = '$NITRITOS', LEUCOCITOS = '$LEUCOCITOS' WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION ='$ID_EVALUACION'";
			if ($conexion->query($sqlUpdate) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
			
		}

		else{
			$sqlInsert = "INSERT INTO medico_bitacora3 VALUES ('$ID_CANDIDATO', '$ID_EVALUACION','$GLUCOSA', '$COLOR_ASPECTO' ,'$BILIRRUBINA', '$CETONAS', '$DENSIDAD', '$SANGRE', '$PH', '$PROTONES', '$UROBILINOGENO', '$NITRITOS', '$LEUCOCITOS')";

			if ($conexion->query($sqlInsert) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
		}
		

$conexion->close();

?>