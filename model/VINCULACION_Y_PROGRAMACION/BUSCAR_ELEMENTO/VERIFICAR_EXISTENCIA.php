<?php
include ("MySqlConnect.php");
include ("../../conection.php");
$conexion = new MySqlConnect($db, $user, $pswd);

$CURP = $_POST['CURP'];

if (isset($CURP))
{
	$existe = $conexion->getValueFromQuery("SELECT CURP FROM CANDIDATOS WHERE CURP = '$CURP'", "CURP");
	if (empty($existe))
	{
		echo "false";
	}
	else
	{
		echo "true";
	}
}
else
{
	echo "Solicitud no procesada 0x0001";
}
$conexion->closeMySqlConnection();

?>