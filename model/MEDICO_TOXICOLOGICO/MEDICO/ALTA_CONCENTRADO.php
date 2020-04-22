<?php
header("Content-type: text/html; charset=utf8");
require("../../conexion.php");
include_once "ConexionBD.php"; 

$fecha = $_POST['fecha'];
$CURP = $_POST['CURP'];
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];
$peso = $_POST['peso'];
$talla = $_POST['talla'];
$imc = $_POST['imc'];
$pade1 = $_POST['pade1'];
$pade2 = $_POST['pade2'];
$tatuajes = $_POST['tatuajes'];
$observaciones = $_POST['observaciones'];
$resultado = $_POST['resultado'];


/*"INSERT INTO ASISTENCIA VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$PRUEBA' ,'$FECHA', '$ASISTENCIA')"*/
		if($resultado == "APROBADO"){
			$resultado = "1";
		}
		elseif ($resultado == "NO APROBADO") {
			$resultado = "0";
		}
		elseif ($resultado == "NO APROBADO") {
			$resultado = "0";
		}
		$cone = conectarBD();
		$ID_CANDIDATO = Consultar_ID_CANDIDATO($cone,$CURP);
		if($ID_CANDIDATO=="incorrecto"){
			echo "false";
		}
		else{
			$ID_EVALUACION = Consultar_ID_EVALUACION($cone,$ID_CANDIDATO,$fecha);

			if($ID_EVALUACION =="incorrecto"){
				echo "false";
			}
			else{
				$conexion->set_charset("utf8");

				$sqlInsert = "INSERT INTO concentrado_medico VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$sexo','$edad' ,'$peso', '$talla', '$imc', '$pade1', '$pade2', '$tatuajes')";

				if ($conexion->query($sqlInsert) === TRUE) {
		   	 		$sqlInsert = "INSERT INTO reportes VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$observaciones','$CURP' ,'$resultado','MÉDICO')";

					if ($conexion->query($sqlInsert) === TRUE) {
			   	 		echo "true";
					} 
					else {
			    		echo "false";
					}
				} 
				else {
		    		echo "false";
				}
			}
		}

$conexion->close();

?>