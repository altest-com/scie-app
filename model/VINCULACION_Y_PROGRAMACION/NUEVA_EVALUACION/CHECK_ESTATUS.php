<?php
header("Content-Type: text/html;charset=utf-8");
include ("../../conection.php");
include ("../../MySqlConnect.php");
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$conexion = new MySqlConnect($db, $user, $pswd);
$estatus = (int)$conexion->getValueFromQuery(sprintf("SELECT ESTATUS FROM EVALUACION WHERE ID_EVALUACION LIKE '%s';", $ID_EVALUACION), "ESTATUS");
if ($estatus == 0)
{
	$IdExpediente = $conexion->getValueFromQuery(sprintf("SELECT ID_EXPEDIENTE FROM EXPEDIENTE_INFORMACION WHERE ID_EVALUACION LIKE '%s';", $ID_EVALUACION), "ID_EXPEDIENTE");
	if (strcmp($IdExpediente, "") == 0 || $IdExpediente === NULL)
	{
		//No hay expediente, por lo tanto, no hay registro y no ha finalizado
		echo "false.IdExpediente";
	}
	else
	{
		$IdResultado = $conexion->getValueFromQuery(sprintf("SELECT ID_RESULTADO FROM NOTIFICACION_EXPEDIENTE WHERE ID_EXPEDIENTE LIKE '%s';", $IdExpediente), "ID_RESULTADO");
		if (strcmp($IdResultado, "") == 0 || $IdResultado === NULL)
		{
			// No hay Resultado, por lo tanto, no hay registro y no ha finalizado
			echo "false.IdResultado";
		}
		else
		{
			$registro = $conexion->getValueFromQuery(sprintf("SELECT ID_RESULTADO AS REGISTRO FROM NOTIFICACION_INFORMACION WHERE ID_RESULTADO LIKE '%s';", $IdResultado), "REGISTRO");
			if (strcmp($registro, "") == 0 || $registro === NULL)
			{
				// No hay registro, por lo tanto no ha finalizado
				echo "false.Registro";
			}
			else
			{
				echo "true";
			}
		}
	}
}
else
{
	echo "false.estatus";
}

$conexion->closeMySqlConnection();

?>