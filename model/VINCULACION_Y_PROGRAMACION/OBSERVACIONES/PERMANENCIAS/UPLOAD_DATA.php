<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
include ("../../conection.php"); 
include ("../../MySqlConnect.php");

$CURP = $_POST['CURP'];
$conexion = new MySqlConnect($db, $user, $pswd);

if (isset($CURP))
{
    $queryVerificarCurp = sprintf("SELECT CURP AS ROW FROM CANDIDATOS WHERE CURP LIKE '%s'", $CURP);
    $CurpObtenida = $conexion->getSingleValueFromQuery($queryVerificarCurp);
    if (strcmp($CURP, $CurpObtenida) == 0)
    {
        // Si es la misma, esta en el sistema
        $queryVerificarSiHayPermanenciaActiva = sprintf("SELECT CURP AS ROW FROM VINCULACION_CURPS WHERE ESTATUS = 0 AND CURP LIKE '%s'", $CURP);
        $CurpExistenteConPermanenciaActiva = $conexion->getSingleValueFromQuery($queryVerificarSiHayPermanenciaActiva);
        if (strcmp($CURP, $CurpExistenteConPermanenciaActiva) != 0)
        {
            $sqlInsertarPermanencia = sprintf("INSERT INTO VINCULACION_CURPS (CURP, ESTATUS) VALUES ('%s', '0');", $CURP);
            $conexion->executeInsertQuery($sqlInsertarPermanencia);
            echo ":".$CURP." Subida exitosamente.";
        }
        else
        {
            echo ":".$CURP." Ya tiene una evaluación de permenencia en proceso.";
        }
    }
    else
    {
        // Si no es la misma, no existe en el sistema
        echo ":".$CURP." La curp especificada no existe en el sistema.";
    }
}

$conexion -> close();
?>