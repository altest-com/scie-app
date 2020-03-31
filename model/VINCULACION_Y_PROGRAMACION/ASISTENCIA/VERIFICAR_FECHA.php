<?php
include_once "ConexionBD.php";

$PRUEBA = $_POST['PRUEBA'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
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
		$cone = conectarBD();
		$lol = Obtener_fecha($cone,$ID_EVALUACION, $EXAMEN);
		
		echo $lol;
?>