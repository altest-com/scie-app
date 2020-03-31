<?php
{
    include ("../conection.php");
    include ("../MySqlConnect.php");

    $IdEvaluacion = $_POST['ID_EVALUACION'];
    $IdInvestigador = $_POST['ID_INVESTIGADOR'];
    $Fecha = $_POST['FECHA'];
    $Vinculos = $_POST['VINCULOS'];
    $Domicilio = $_POST['DOMICILIO'];
    $Educacion = $_POST['EDUCACION'];
    $InfoFinanciera = $_POST['INFO_FINANCIERA'];
    $AspectosLaborales = $_POST['ASPECTOS_LABORALES'];
    $OtrosAspectos = $_POST['OTROS_ASPECTOS'];
    $Observaciones = $_POST['OBSERVACIONES'];

    if (isset($IdEvaluacion) && isset($IdInvestigador))
    {
        $conexion = new MySqlConnect($db, $user, $pswd);
        $queryDel = sprintf("DELETE FROM INVESTIGACION_ANTECEDENTES WHERE ID_EVALUACION LIKE '%s';", $IdEvaluacion);
        $InsertQuery = sprintf("INSERT INTO INVESTIGACION_ANTECEDENTES VALUES ('%s', (SELECT ID_EVALUADOR FROM EVALUADORES WHERE ID LIKE '%s'), '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s');", 
                        $IdEvaluacion, $IdInvestigador, $Fecha, $Vinculos, $Domicilio, $Educacion, $InfoFinanciera, $AspectosLaborales, $OtrosAspectos, $Observaciones);
        $conexion->executeInsertQuery($queryDel.$InsertQuery,2);
        $conexion->closeMySqlConnection();
    }
}
?>