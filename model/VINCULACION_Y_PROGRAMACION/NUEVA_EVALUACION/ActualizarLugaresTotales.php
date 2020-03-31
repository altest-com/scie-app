<?php
{
    header("Content-Type: text/html;charset=utf-8");
    include ("../../conection.php");
    include ("../../mySqlConnect.php");
    $TOX = $_POST['TOX'];
    $PSI = $_POST['PSI'];
    $ISE = $_POST['ISE'];
    $MED = $_POST['MED'];
    $POL = $_POST['POL'];
    $T1 = $_POST['TIEMPO_1'];
    $T2 = $_POST['TIEMPO_2'];

    $sql = sprintf("UPDATE LUGARES_DISPONIBLES SET TOX = %d, PSI = %d, ISE = %d, MED = %d, POL = %d, TIEMPO_1 = '%s', TIEMPO_2 = '%s';", $TOX, $PSI, $ISE, $MED, $POL, $T1, $T2);
    $conexion = new MySqlConnect($db, $user, $pswd);
    $conexion->executeInsertQuery($sql);
    $conexion->closeMySqlConnection();
}
?>