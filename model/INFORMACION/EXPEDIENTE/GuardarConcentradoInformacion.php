<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conection.php");
include("../../MySqlConnect.php");

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$C1 = $_POST['C1'];
$C2 = $_POST['C2'];
$C3 = $_POST['C3'];
$C4 = $_POST['C4'];
$C5 = $_POST['C5'];
$C6 = $_POST['C6'];
$C7 = $_POST['CBOX'];
$BANDERA = "1"; //LA BANDERA ES POR SI SE OCUPA EDITAR, SE DEBE MANDAR DESDE EL SISTEMA, AQUI ESTA SETEADA SOLO PARA PRUEBAS, HAY QUE CAMBIARLA!!

    $sql = "";
    if (strcmp($BANDERA, "1") == 0) // 1 es nuevo, 0 es para actualizar
    {
        //echo "Aqui";
        $sql1 = sprintf("DELETE FROM CONCENTRADO_INFORMACION WHERE ID_EVALUACION='%s';", $ID_EVALUACION);
        $sql = sprintf("INSERT INTO CONCENTRADO_INFORMACION VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s');", $ID_CANDIDATO, $ID_EVALUACION, $C1, $C2, $C3, $C4, $C5, $C6, $C7);
    }
    else
    {
        $sql1="";
        $sql = sprintf("UPDATE CONCENTRADO_INFORMACION SET C1 = '%s', C2 = '%s', C3 = '%s', C4 = '%s', C5 = '%s', C6 = '%s', C7 = '%s' WHERE ID_EVALUACION LIKE '%s';", $C1, $C2, $C3, $C4, $C5, $C6, $C7, $ID_EVALUACION);
    }
    $conexion = new MySqlConnect($db, $user, $pswd);
    $conexion -> executeInsertQuery($sql1.$sql, 2);
    $conexion->closeMySqlConnection();
?>