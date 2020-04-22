<?php
header("Content-type: text/html; charset=utf8");
require("../../../conexion.php");
include_once "../ConexionBD.php"; 

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$TEMPERATURA = $_POST['TEMPERATURA'];
$RESULTADO_P = $_POST['RESULTADO_P'];
$CREATINA = $_POST['CREATINA'];
$NITRITOS = $_POST['NITRITOS'];
$GLUTALDEHIDOS = $_POST['GLUTALDEHIDOS'];
$PH = $_POST['PH'];
$GRAVEDAD = $_POST['GRAVEDAD'];
$CLORO = $_POST['CLORO'];
$RESULTADO_F = $_POST['RESULTADO_F'];
$OBSERVACIONES = $_POST['OBSERVACIONES'];
$NOMBRE = $_POST['NOMBRE'];
$BLANQUEADOR = $_POST['BLANQUEADOR'];


/*"INSERT INTO ASISTENCIA VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$PRUEBA' ,'$FECHA', '$ASISTENCIA')"*/
		$cone = conectarBD();
		$lol = Verificar_bitacora1($cone,$ID_CANDIDATO, $ID_EVALUACION);
		echo $lol;
		$conexion->set_charset("utf8");

		if($lol=="correcto"){
			$sqlUpdate = "UPDATE toxicologico_bitacora1 SET TEMPERATURA = '$TEMPERATURA', RESULTADO_PRELIMINAR = '$RESULTADO_P', CREATININA = '$CREATINA', NITRITOS = '$NITRITOS', GLUTALDEHIDOS = '$GLUTALDEHIDOS', PH = '$PH', GRAVEDAD_ESPECIFICA = '$GRAVEDAD', CLOROCROMATO = '$CLORO', RESULTADO_FINAL = '$RESULTADO_F', OBSERVACIONES = '$OBSERVACIONES', BLANQUEADOR = '$BLANQUEADOR' WHERE ID_CANDIDATO = '$ID_CANDIDATO' AND ID_EVALUACION ='$ID_EVALUACION'";
			if ($conexion->query($sqlUpdate) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
			
		}

		else{
			$sqlInsert = "INSERT INTO toxicologico_bitacora1 VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$TEMPERATURA' ,'$RESULTADO_P', '$CREATINA', '$NITRITOS', '$GLUTALDEHIDOS', '$PH', '$GRAVEDAD', '$CLORO', '$RESULTADO_F', '$OBSERVACIONES','$BLANQUEADOR')";

			if ($conexion->query($sqlInsert) === TRUE) {
		   	 	echo "true";
			} 
				else {
		    	echo "false";
					 }
		}
		

$conexion->close();

?>