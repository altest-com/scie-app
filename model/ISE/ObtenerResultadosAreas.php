<?php
{
    include ("../conection.php");
    include ("../MySqlConnect.php");

    $IdCandidato = $_POST['ID_CANDIDATO'];

    if (isset($IdCandidato))
    {
        $conexion = new MySqlConnect($db, $user, $pswd);
        $SelectQuery = sprintf("SELECT DISTINCT E.FOLIO, 
        (SELECT CONCAT(COMENTARIO, '@-@', IF ((RESULTADO = 0), 'RIESGO ALTO', IF ((RESULTADO = 1), 'RIESGO BAJO', IF ((RESULTADO = 2), 'APROBADO CON SEGUIMIENTO', IF ((RESULTADO = 3), 'RIESGO MEDIO', 'NO CUBRE EL PERFIL'))))) FROM reportes_med WHERE ID_CANDIDATO=E.ID_CANDIDATO AND ID_EVALUACION = E.ID_EVALUACION) AS MEDICO,
        (SELECT CONCAT(COMENTARIO, '@-@', IF ((RESULTADO = 0), 'NO APROBADO', IF ((RESULTADO = 1), 'APROBADO', IF ((RESULTADO = 2), 'APROBADO CON SEGUIMIENTO', 'APROBADO CON RESTRICCIONES')))) FROM reportes WHERE ID_CANDIDATO=E.ID_CANDIDATO AND ID_EVALUACION = E.ID_EVALUACION) AS TOXICOLOGIA,
        (SELECT CONCAT(COMENTARIO, '@-@', IF ((RESULTADO = 0), 'NO APROBADO', IF ((RESULTADO = 1), 'APROBADO', IF ((RESULTADO = 2), 'APROBADO CON SEGUIMIENTO', 'APROBADO CON RESTRICCIONES')))) FROM psicologia_reporte WHERE ID_CANDIDATO=E.ID_CANDIDATO AND ID_EVALUACION = E.ID_EVALUACION) AS PSICOLOGIA,
        (SELECT CONCAT(SINTESIS, '@-@', IF ((RESULTADO = 0), 'RIESGO ALTO', IF ((RESULTADO = 1), 'RIESGO BAJO', IF ((RESULTADO = 2), 'APROBADO CON SEGUIMIENTO', IF ((RESULTADO = 3), 'RIESGO MEDIO', 'NO CUBRE EL PERFIL'))))) FROM reporte_ise WHERE ID_CANDIDATO=E.ID_CANDIDATO AND ID_EVALUACION = E.ID_EVALUACION) AS ISE,
        (SELECT CONCAT(SINTESIS, '@-@', IF ((RESULTADO = 0), 'NO APROBADO', IF ((RESULTADO = 1), 'APROBADO', IF ((RESULTADO = 2), 'APROBADO CON SEGUIMIENTO', 'APROBADO CON RESTRICCIONES')))) FROM reporte_integracion WHERE ID_CANDIDATO=E.ID_CANDIDATO AND ID_EVALUACION = E.ID_EVALUACION) AS INTEGRACION,
        (SELECT CONCAT(SINTESIS_TECNICA, '@-@', IF ((RESULTADO = 0), 'RIESGO ALTO', IF ((RESULTADO = 1), 'RIESGO BAJO', IF ((RESULTADO = 2), 'APROBADO CON SEGUIMIENTO', IF ((RESULTADO = 3), 'RIESGO MEDIO', 'NO CUBRE EL PERFIL'))))) FROM reporte_poligrafia WHERE ID_CANDIDATO=E.ID_CANDIDATO AND ID_EVALUACION = E.ID_EVALUACION) AS POLIGRAFIA
        FROM evaluacion E INNER JOIN reporte_integracion R ON R.ID_EVALUACION = E.ID_EVALUACION WHERE E.ID_CANDIDATO = '%s'", $IdCandidato);
        $conexion->executeSelectQuery($SelectQuery, TRUE);
        $conexion->closeMySqlConnection();
    }
}
?>