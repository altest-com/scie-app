<?php
{
    include ("../conection.php");
    include ("../MySqlConnect.php");

    $IdCandidato = $_POST['ID_CANDIDATO'];
    $P_NOMBRE = $_POST['P_NOMBRE']; 
    $S_NOMBRE = $_POST['S_NOMBRE']; 
    $P_APELLIDO = $_POST['P_APELLIDO']; 
    $S_APELLIDO = $_POST['S_APELLIDO']; 
    $CURP = $_POST['CURP']; 

    if (isset($_POST['ID_CANDIDATO']))
    {
        $query = sprintf("UPDATE CANDIDATOS SET PRIMER_NOMBRE = '%s', SEGUNDO_NOMBRE =  '%s', PRIMER_APELLIDO = '%s', SEGUNDO_APELLIDO = '%s', CURP = '%s' WHERE ID_CANDIDATO = '%s';", 
        $P_NOMBRE, $S_NOMBRE, $P_APELLIDO, $S_APELLIDO, $CURP, $IdCandidato);
        $conexion = new MySqlConnect($db, $user, $pswd);
        $conexion->executeInsertQuery($query);
        $conexion->closeMySqlConnection();
    }
}
?>