<?php
{
    include ("../conection.php");
    include ("../MySqlConnect.php");

    $IdCandidato = $_POST['ID_CANDIDATO'];

    if (isset($IdCandidato))
    {
        $conexion = new MySqlConnect($db, $user, $pswd);
        $SelectQuery = sprintf("SELECT DISTINCT E.FOLIO, 
        CONCAT('SIN DATOS', '@-@', IF ((C.MEDICO_R = 0), 'NO APROBADO', IF ((C.MEDICO_R = 1), 'APROBADO', IF ((C.MEDICO_R = 2), 'APROBADO CON SEGUIMIENTO', 'APROBADO CON RESTRICCIONES')))) AS MEDICO,
        CONCAT('SIN DATOS', '@-@', IF ((C.TOX_R = 0), 'NO APROBADO', IF ((C.TOX_R = 1), 'APROBADO', IF ((C.TOX_R = 2), 'APROBADO CON SEGUIMIENTO', 'APROBADO CON RESTRICCIONES')))) AS TOXICOLOGIA,
        CONCAT('SIN DATOS', '@-@', IF ((C.PSICO_R = 0), 'NO APROBADO', IF ((C.PSICO_R = 1), 'APROBADO', IF ((C.PSICO_R = 2), 'APROBADO CON SEGUIMIENTO', 'APROBADO CON RESTRICCIONES')))) AS PSICOLOGIA,
        CONCAT('SIN DATOS', '@-@', IF ((C.ISE_R = 0), 'NO APROBADO', IF ((C.ISE_R = 1), 'APROBADO', IF ((C.ISE_R = 2), 'APROBADO CON SEGUIMIENTO', 'APROBADO CON RESTRICCIONES')))) AS ISE,
        CONCAT('SIN DATOS', '@-@', IF ((C.INTEGRACION_R = 0), 'NO APROBADO', IF ((C.INTEGRACION_R = 1), 'APROBADO', IF ((C.INTEGRACION_R = 2), 'APROBADO CON SEGUIMIENTO', 'APROBADO CON RESTRICCIONES')))) AS INTEGRACION,
        CONCAT('SIN DATOS', '@-@', IF ((C.POLIGRAFIA_R = 0), 'NO APROBADO', IF ((C.POLIGRAFIA_R = 1), 'APROBADO', IF ((C.POLIGRAFIA_R = 2), 'APROBADO CON SEGUIMIENTO', 'APROBADO CON RESTRICCIONES')))) AS POLIGRAFIA
        FROM evaluacion E INNER JOIN concentrado_informacion_resultados C ON C.ID_EVALUACION = E.ID_EVALUACION WHERE E.ID_CANDIDATO = '%s'", $IdCandidato);
        $conexion->executeSelectQuery($SelectQuery, TRUE);
        $conexion->closeMySqlConnection();
    }
}
?>